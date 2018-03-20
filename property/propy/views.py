# -*- coding: utf-8 -*-
#from __future__ import unicode_literals
import requests
import json

from django.db.models import Q,Sum
from django.contrib.auth.models import User
from django.http import HttpResponse
from datetime import datetime,date, time, timedelta
from rest_framework import status
from rest_framework.response import Response
from rest_framework.views import APIView

from propy.models import Wallet, Coin, Buy, Sale, User_coin, Deposite, Withdrawl, Transfer, \
    Transaction
from propy.serializers import Coinserializers, Buyserializers, Sallserializers, \
    UserCoinserializers, Transsactionserializers


class UserList(APIView):
    def post(self,request ):
        password = request.POST['password']
        url = 'http://localhost:3001/api/generateNew'
        headers = {'content-type': 'application/json'}
        params = {
            "pass": password
        }
        response = requests.post(url, data=json.dumps(params), headers=headers)
        datares = json.loads(response.text)
        file_data = datares['data']
        file_name = datares['name']
        s = datares['prik']
        pk = s.replace('0x', '')
        address = datares['address']
        with open('/root/.ethereum/keystore/'+file_name , 'w') as outfile:
            json.dump(file_data, outfile)
        Utcfile = Wallet(
                    address=address,
                    privatekey=pk,
                    file = file_name,
                    password= password
                )
        Utcfile.save()
        return Response({'filedata':file_data,'filename':file_name,'address':address,'pk':pk},  status=status.HTTP_201_CREATED)



class Privatekey(APIView):
    def post(self,request ):
        password = request.POST.get('password')
        filedata = request.POST.get('file_data')
        file_name = request.POST.get('file_name')
        file_data = json.loads(filedata)
        url = 'http://localhost:3001/api/generatePk'
        headers = {'content-type': 'application/json'}
        params = {
            "pass": password,
            "pubk": file_data
        }
        response = requests.post(url, data=json.dumps(params), headers=headers)
        datares = json.loads(response.text)
        s = datares['privateKey']
        pk = s.replace('0x', '')
        address = datares['address']
        try:
            private_key = Wallet.objects.get(password=password,address=address)
            private_key.privatekey = pk
            private_key.save()
        except:
            private_key = Wallet.objects.create(password=password, address=address, privatekey=pk)
            with open('/root/.ethereum/keystore/' + file_name, 'w') as outfile:
                json.dump(file_data, outfile)
        return Response({'privatekey':pk, 'address':address},  status=status.HTTP_201_CREATED)


class Getadd_via_pk(APIView):
    def post(self,request ):
        private_key = request.POST['pk']
        url = 'http://localhost:3001/api/unlockTPk'
        headers = {'content-type': 'application/json'}
        if private_key.startswith('0x'):
            params = {
                "prik":private_key,
            }
        else:
            params = {
            "prik":'0x'+private_key,
            }
        response = requests.post(url, data=json.dumps(params), headers=headers)
        datares = json.loads(response.text)
        pk = datares['det']
        address = pk['address']
        pki = private_key.replace('0x', '')
        private_key,created = Wallet.objects.get_or_create(address=address,privatekey=pki)
        user_id=private_key.id
        id = {'user_id':user_id}
        pk.update(id)
        return Response({'detail':pk},  status=status.HTTP_201_CREATED)



class Last_price(APIView):
    def get(self, request, format=None):
        coin = Coin.objects.all()
        price = []
        ye = []
        percen = []
        val=[]
        for i in coin:
            last_price = Transaction.objects.filter(sellorder__coin_id=i.id).order_by('sellorder__coin_id', '-date')[:1]
            la_price = Transaction.objects.filter(sellorder__coin_id=i.id).order_by('sellorder__coin_id', '-date')[:2]
            for k in la_price:
                ye.append({"coin_id":k.sellorder.coin_id,"price":k.price})
            for j in last_price:
                price.append({'id':j.sellorder.coin_id, 'price': j.price})
        count =1
        lastv=0
        perc = []
        for k in ye:
            if count%2 ==0:
                diff = lastv-k['price']
                per = (diff *100)/lastv
                perc.append({"coin_id":k['coin_id'],"percentage":per})
            else:
                lastv = k['price']
            count =count +1
            diff = 0
        return Response({"lastprice": price,"percentage":perc})

#class Last_price(APIView):
    #def get(self, request, format=None):
        #coin = Coin.objects.all()
        #price = []
        #for i in coin:
            #last_price = Transaction.objects.filter(sellorder__coin_id=i.id).order_by('sellorder__coin_id', '-date')[:1]
            #for j in last_price:
                #price.append({'id':j.sellorder.coin_id, 'price': j.price})
        #return Response({"lastprice": price})


class CoinApi(APIView):
   def get(self, request, format=None):
        coin_name = []
        coin = Coin.objects.all()
        for i in coin:
            coindetail = User_coin.objects.filter(coin=i.id)
            total = coindetail.aggregate(Sum('balance'))
            coin_name.append({'id': i.id,
                         'name': i.name,
                         'short': i.shortname,
                         'address':i.contract_add,
                         'bal': total['balance__sum'] or 0,
                         })
        return Response({"coin": coin_name})
   
   def post(self,request, format=None):
        serializer = Coinserializers(data = request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data, status=status.HTTP_201_CREATED)
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)


class BuyApi(APIView):
    def get(self, request, format=None):
        users = Buy.objects.filter(~Q(status=1))
        serializer = Buyserializers(users, many=True)
        return Response(serializer.data)

    def post(self,request, format=None):
        serializer = Buyserializers(data = request.data)
        if serializer.is_valid():
            coin = request.data.get('coin')
            volume = request.data.get('volume')
            pr = volume
            price = request.data.get('price')
            user = request.data.get('user')
            try:
                user_coin = User_coin.objects.get(user_id=user , coin_id =1)
            except:
                return Response({'response': 'you dont have enough balance' , 'code':0}, status=status.HTTP_201_CREATED)
            if float(user_coin.balance) > float(price):
                ('>>>>>>>>>>>>>>>','kkkkkkkkkkkk')
                serializer.save()
                user_coin.balance = float(user_coin.balance) - float(price)
                user_coin.lock_balance =float(user_coin.lock_balance) + float(price)
                user_coin.save()
                while pr > 0:
                    qw = []
                    sale = Sale.objects.filter(~Q(status=1),~Q(user_id=serializer.data['id']), coin=coin).order_by('date')
                    if sale.count() >0:
                        buy = Buy.objects.get(id=serializer.data['id'])
                        for i in sale:
                            if i.price <= price:
                                qw.append({'id':i.id,'price':i.price})

                        newlist = sorted(qw, key=lambda k: k['price'])
                        try:
                            min_price = Sale.objects.get(id = newlist[0]['id'] )
                        except:
                            buy.status = -1
                            buy.volume = pr
                            buy.save()
                            return Response({'response': 'Not fully matched','remaining':pr , 'code':2}, status=status.HTTP_201_CREATED)
                        partial =  int(pr) - int(min_price.volume)
                        if float(min_price.volume) <= float(pr):
                            tr = Transaction()
                            tr.sellorder = min_price
                            tr.buyorder = buy
                            tr.volume = int(min_price.volume)
                            tr.price = float(min_price.price)
                            tr.save()
                            min_price.status = 1
                            min_price.volume = 0
                            min_price.save()
                            pr = partial
                        else:
                            tr = Transaction()
                            tr.sellorder = min_price
                            tr.buyorder = buy
                            tr.volume = pr
                            tr.price = float(min_price.price)
                            tr.save()
                            partial = int(pr) - int(min_price.volume)
                            min_price.status = -1
                            min_price.partial = -(partial)
                            min_price.volume = -(partial)
                            min_price.save()
                            pr = partial
                        user_coin.lock_balance = float(user_coin.lock_balance)-float(min_price.price)
                        user_coin.save()
                        try:
                            bal = User_coin.objects.get(user_id=min_price.user,coin_id=1)
                            bal.balance= float(bal.balance)+float(min_price.price)
                            bal.save()
                        except:
                            bal = User_coin.objects.create(
                                user_id=min_price.user,
                                coin_id=1,
                                balance =float(min_price.price)
                                )
                            bal.save()
                        if pr <= 0:
                            buy.status = 1
                            buy.volume = 0
                            buy.save()
                    else:
                        return Response({'response': 'We dont have any order matching your querry','code':3},
                                        status=status.HTTP_201_CREATED)
                return Response({'response': 'order matched successfully','code':1}, status=status.HTTP_201_CREATED)
            return Response({'response': 'you dont have enough balance','code':-1}, status=status.HTTP_201_CREATED)
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)


class SaleApi(APIView):
    def get(self, request, format=None):
        users = Sale.objects.filter(~Q(status=1))
        serializer = Sallserializers(users, many=True)
        return Response(serializer.data)

    def post(self,request, format=None):
        serializer = Sallserializers(data = request.data)
        if serializer.is_valid():
            coin = request.data.get('coin')
            volume = request.data.get('volume')
            pr = volume
            price = request.data.get('price')
            user = request.data.get('user')
            try:
                user_coin = User_coin.objects.get(user_id=user , coin_id=coin)
            except:
                return Response({'response': 'you dont have enough balance' , 'code':0}, status=status.HTTP_201_CREATED)
            if float(user_coin.balance) > float(price):
                serializer.save()
                while pr > 0:
                    qw = []
                    buy = Buy.objects.filter(~Q(status=1),~Q(user_id=serializer.data['id']), coin=coin).order_by('date')
                    if buy.count() > 0:
                        sale = Sale.objects.get(id=serializer.data['id'])
                        for i in buy:
                            if i.price <= price:
                                qw.append({'id':i.id,'price':i.price})
                        newlist = sorted(qw, key=lambda k: k['price'] ,reverse=True)
                        try:
                            min_price = Buy.objects.get(id = newlist[0]['id'] )
                        except:
                            sale.status = -1
                            sale.volume = pr
                            sale.save()
                            return Response({'response': 'Not fully matched', 'remaining': pr , 'code':2}, status=status.HTTP_201_CREATED)
                        partial =  int(pr) - int(min_price.volume)
                        if float(min_price.volume) <= float(pr):
                            
                            tr = Transaction()
                            tr.sellorder = sale
                            tr.buyorder = min_price
                            tr.volume = int(min_price.volume)
                            tr.price = price
                            tr.save()
                            min_price.status = 1
                            min_price.volume = 0
                            min_price.save()
                            pr = partial
                        else:
                            tr = Transaction()
                            tr.sellorder = sale
                            tr.buyorder = min_price
                            tr.volume = pr
                            tr.price = float(price)
                            tr.save()
                            partial = int(pr) - int(min_price.volume)
                            min_price.status = -1
                            min_price.partial = -(partial)
                            min_price.volume = -(partial)
                            min_price.save()
                            pr = partial
                        user_coin.balance=float(user_coin.balance)+float(price)
                        user_coin.save()
                        try:
                            bal = User_coin.objects.get(user_id=min_price.user,coin_id=coin)
                            bal.balance = float(bal.balance) + float(price)
                            bal.save()
                        except:
                            bal = User_coin.objects.create(user_id=min_price.user,coin_id=coin,balance=float(price))
                        if pr <= 0:
                            sale.status = 1
                            sale.volume = 0
                            sale.save()
                    else:
                        return Response({'response': 'We dont have any order matching your querry','code':3},
                                        status=status.HTTP_201_CREATED)
                return Response({'response': 'order matched successfully' ,'code':1}, status=status.HTTP_201_CREATED)
            return Response({'response': 'you dont have enough balance' , 'code':-1}, status=status.HTTP_201_CREATED)
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)



class Transacton(APIView):
    def post(self, request):
        coin = request.POST['coin']
        trans = Transaction.objects.filter(sellorder__coin_id=coin).order_by('-date')
        serializer = Transsactionserializers(trans, many=True)
        return Response(serializer.data)


class UserTransacton(APIView):
    def post(self, request):
        coin = request.POST['coin']
        user = request.POST['user']
        trans = Transaction.objects.filter(sellorder__coin_id=coin , sellorder__user_id=user).order_by('-date')
        serializer = Transsactionserializers(trans, many=True)
        return Response(serializer.data)


class Sellorder(APIView):
    def post(self, request):
        coin = request.POST.get('coin')
        sale = Sale.objects.filter(~Q(status=1), coin_id=coin).order_by('-price')
        serializer = Sallserializers(sale, many=True)
        return Response(serializer.data)


class Buyorder(APIView):
    def post(self, request):
        coin = request.POST.get('coin')
        buy = Buy.objects.filter(~Q(status=1), coin_id=coin).order_by('-price')
        serializer = Buyserializers(buy, many=True)
        return Response(serializer.data)


class user_open_order(APIView):
    def post(self, request):
        coin = request.POST.get('coin')
        user = request.POST.get('user')
        buy = Buy.objects.filter(~Q(status=1),user_id=user, coin_id=coin).order_by('-price')
        sale = Sale.objects.filter(~Q(status=1), user_id=user, coin_id=coin).order_by('-price')
        serializer = Buyserializers(buy, many=True)
        serialize = Sallserializers(sale, many=True)
        return Response({'buy':serializer.data,'sale':serialize.data})



class AddKyc(APIView):
    def post(self, request):
        U = request.POST['user']
        mobile = request.POST['mobile']
        address = request.POST['address']
        pan_no = request.POST['pan_no']
        dob = request.POST['dob']
        try:
            image_url = request.FILES['image']
        except:
            image_url = None
        account_no = request.POST['account_no']
        city = request.POST['city']
        post_code = request.POST['post_code']
        user = User.objects.get(username=U)
        kyc = Kyc.objects.create(
            user = user,
            mobile= mobile,
            address=address,
            pan_no=pan_no,
            dob =dob,
            images=image_url,
            account_no=account_no,
            city=city,
            post_code=post_code
        )
        kyc.save()
        return HttpResponse(json.dumps({"status": "200", "message": "success"}))

class sendMessages(APIView):
     def get(self,request):
         message= UserMessages.objects.all().order_by('-time')[:20]
         serializer = Messageserializers(message, many=True)
         return Response(serializer.data)

     def post(self,request):
         senderId = request.POST['sender']
         message = request.POST['message']
         sender = Wallet.objects.get(pk=senderId)
         msg = UserMessages.objects.create(sender=sender,message=message,time=datetime.now())
         msg.save()
         return HttpResponse(json.dumps({"status":"200","message":"success"}))


class FeedsData(APIView):
     def get(self,request):
         feeds= Feeds.objects.all().order_by('-time')[:10]
         serializer = Feedserializers(feeds, many=True)
         return Response(serializer.data)

     def post(self,request):
         article = request.POST['article']
         feed = Feeds.objects.create(article=article,time=datetime.now())
         feed.save()
         return HttpResponse(json.dumps({"status":"200","message":"success"}))


class UserCoin(APIView):
     def post(self,request):
         bal = []
         user = request.POST.get('user')
         userCoin= User_coin.objects.filter(user_id=user)
         for i in userCoin:
            bal.append({'coin':i.coin.name,
                        'balance':str(i.balance),
                        'lock_bal':str(i.lock_balance),
			'coinId':i.coin.id,
                        })
         return HttpResponse(json.dumps({'user_balance':bal}))



def getetherbal(address):
    url = 'http://localhost:3001/api/getEtherBalance'
    headers = {'content-type': 'application/json'}
    params = {
        "ether_address": address
    }
    response = requests.post(url, data=json.dumps(params), headers=headers)
    datares = json.loads(response.text)
    balance = datares['bal']
    return Response({'bal': balance,},status=status.HTTP_201_CREATED)

def gecoinbal(abi,contract_add,ether_add):
    url = 'http://localhost:3001/api/getBalance'
    headers = {'content-type': 'application/json'}
    params = {
        "abiArray": abi,
        "contractAddress": contract_add,
        "ether_address": ether_add
    }
    response = requests.post(url, data=json.dumps(params), headers=headers)
    datares = json.loads(response.text)
    balance = datares['bal']
    return Response({'bal': balance,},status=status.HTTP_201_CREATED)

def txnDetail(txnHash):
    url = 'http://localhost:3004/api/getTransactionStatus'
    headers = {'content-type': 'application/json'}
    params = {
        "txnHash": txnHash
    }
    response = requests.post(url,data=json.dumps(params),headers=headers)
    datares = json.loads(response.text)
    receipt = datares['receipt']
    return Response(json.dumps(receipt))

class UserCoinMain(APIView):
    def post(self, request):
        bal = []
        user = request.POST.get('user')
        coin = Coin.objects.all()
        for i in coin:
            if int(i.id)==1:
                u = Wallet.objects.get(id=user)
                ar = getetherbal(u.address)
                ba = ar.data['bal']
                bal.append({'coin': i.name,
                            'coinId':i.id,
                            'shortname':i.shortname,
                            'balance': ba
                            })
            else:
                u = Wallet.objects.get(id=user)
                ar = gecoinbal(i.Abi,i.contract_add,u.address)
                ba = ar.data['bal']
                bal.append({'coin': i.name,
                            'coinId': i.id,
                            'shortname': i.shortname,
                            'balance':ba
                            })
        return HttpResponse(json.dumps({'user_balance': bal}))

class Query(APIView):
    def post(self, request):
        bal = []
        user = request.POST.get('user')
        coin = request.POST.get('coin')
        try:
            userCoin = User_coin.objects.get(user_id=user,coin_id=coin )
            if int(coin)==1:
                ar = getetherbal(userCoin.user.address)
                ba = ar.data['bal']
                bal.append({'coin': userCoin.coin.name,
                            'coinId': userCoin.coin.id,
                            'balance': ba
                            })
            else:
                ar = gecoinbal(userCoin.coin.Abi,userCoin.coin.contract_add,userCoin.user.address)
                ba = ar.data['bal']
                bal.append({'coin': userCoin.coin.name,
                            'coinId': userCoin.coin.id,
                            'balance':ba
                            })
        except User_coin.DoesNotExist:
            return Response(json.dumps({'user_balance': 'you have no such coin'}))
        return Response(json.dumps({'user_balance': bal}))

class DepositeList(APIView):
    def post(self, request):
        userId = request.POST['user']
        coinId = request.POST['coin']
        user = Wallet.objects.get(id=userId)
        coin = Coin.objects.get(id=coinId)
        balance = request.POST['balance']
        if int(coinId) == 1:
            ar = getetherbal(user.address)
            if ar.data['bal'] > float(balance):
                url = 'http://localhost:3004/api/sendEtherTransaction/'
                params = {
                    "from": user.address,
                    "to": '0xbDfD1B9E1dbeE3dcAa4FA94314C5CC660F831680',
                    "value": str(balance),
                    "pass": user.password
                }
            else:
                return Response(json.dumps({"message": "transaction failed due to insufficient balance"}))
        else:
            pr = gecoinbal(coin.Abi, coin.contract_add,user.address)
            pr.data['bal']
            if pr.data['bal'] > float(balance):
                url = 'http://localhost:3004/api/transferTo/'
                params = {
                    "contractAddress": coin.contract_add,
                    "abiArray": coin.Abi,
                    "from": user.address,
                    "to": '0xbDfD1B9E1dbeE3dcAa4FA94314C5CC660F831680',
                    "value":str(balance),
                    "password": user.password
                }
            else:
                return Response(json.dumps({"message": "transaction failed due to insufficient balance"}))
        headers = {'content-type': 'application/json'}
        response = requests.post(url, data=json.dumps(params), headers=headers)
        datares = json.loads(response.text)
        res = datares['txnHash']
        if datares['error']!='Null':

            return Response(json.dumps({"message":datares['error']}))
        if(res == None):
            return Response(json.dumps({"message":datares['error']}))
        else:
            dep = Deposite.objects.create(amount=balance, tranx_id=res, coin_id=coinId, user_id=userId)
            dep.save()
            return Response(json.dumps({'det': res, "status": "200", "message": "Deposit success"}))


class WithdrawlList(APIView):
     def post(self,request):
         userId = request.POST['user']
         coinId = request.POST['coin']
         user = Wallet.objects.get(id=userId)
         coin = Coin.objects.get(id=coinId)
         try:
            bal = User_coin.objects.get(user_id=userId,coin=coin)
         except:
             return Response(json.dumps({"status":"fail","message":"you don't have such coin "}))
         coinbal=float(bal.balance)
         balance=request.POST['balance']
         if coinbal<float(balance):
             return Response(json.dumps({"status":"fail","message":"Sorry you don't have enough Balance"}))
         else:
             if int(coinId) == 1:
                 ar = getetherbal('0xbDfD1B9E1dbeE3dcAa4FA94314C5CC660F831680')
                 if ar.data['bal'] > float(balance):
                     url = 'http://localhost:3004/api/sendEtherTransaction'
                     params = {
                         "from":'0xbDfD1B9E1dbeE3dcAa4FA94314C5CC660F831680',
                         "to":user.address,
                         "value":str(balance),
                         "pass":'redbull1992'
                     }
                 else:
                     return Response(json.dumps({"message": "transaction failed due to insufficient balance"}))
             else:
                 pr = gecoinbal(coin.Abi, coin.contract_add,'0xbDfD1B9E1dbeE3dcAa4FA94314C5CC660F831680')
                 if pr.data['bal'] > float(balance):
                     url = 'http://localhost:3004/api/transferTO/'
                     params = {
                         "contractAddress": coin.contract_add,
                         "abiArray": coin.Abi,
                         "from_account": '0xbDfD1B9E1dbeE3dcAa4FA94314C5CC660F831680',
                         "to_account": user.address,
                         "value": balance,
                         "password": 'redbull1992'
                     }
                 else:
                     return Response(json.dumps({"message": "transaction failed due to insufficient balance"}))
             headers = {'content-type': 'application/json'}
             response = requests.post(url, data=json.dumps(params), headers=headers)
             datares = json.loads(response.text)
             tranx_id = datares['txnHash']
             dep = Withdrawl.objects.create(amount=balance, tranx_id=tranx_id, coin_id=coinId, user_id=userId)
             dep.save()
             return Response(json.dumps({"status": "200", "message": "Withdrwal success"}))



class TransferList(APIView):
     def post(self,request):
         userId = request.POST['user']
         coinId = request.POST['coin']
         address= request.POST['address']
         amount = request.POST['amount']
         user = Wallet.objects.get(id=userId)
         coin = Coin.objects.get(id=coinId)
         try:
            bal = User_coin.objects.get(user_id=userId,coin_id=coinId)
         except:
             return Response(json.dumps({"status":"fail","message":"you don't have such coin "}))
         coinbal=bal.balance
         fromadd=user.address
         if float(coinbal)< float(amount):
            return Response(json.dumps({"status":"fail","message":"Sorry you don't have enough Balance"}))
         else:
             if int(coinId) == 1:
                 ar = getetherbal(fromadd)
                 if ar.data['bal'] > float(amount):
                     url = 'http://localhost:3004/api/sendEtherTransaction'
                     params = {
                         "from": fromadd,
                         "to": address,
                         "value": str(amount),
                         "pass": user.password,
                     }
                 else:
                     return Response(json.dumps({"message": "transaction failed due to insufficient balance"}))
             else:
                 pr = gecoinbal(coin.Abi, coin.contract_add, fromadd)
                 if pr.data['bal'] > coinbal:
                     url = 'http://localhost:3004/api/sendEtherTransaction/'
                     params = {
                         "contractAddress": coin.contract_add,
                         "abiArray": coin.Abi,
                         "from_account": fromadd,
                         "to_account": address,
                         "password": user.password
                     }
                 else:
                     return Response(json.dumps({"message": "transaction failed due to insufficient balance"}))
             headers = {'content-type': 'application/json'}
             response = requests.post(url, data=json.dumps(params), headers=headers)
             datares = json.loads(response.text)
             tranx_id = datares['txnHash']
             dep = Transfer.objects.create(user_id=userId, coin_id=coinId, amount=amount, tranx_id=tranx_id, address=address)
             dep.save()
             return Response(json.dumps({"status": "200", "message": "Transfer success"}))


class GetDet(APIView):
    def post(self,request):
        date_from = datetime.now() - timedelta(days=1)
        coinId=request.POST['coin']
        created_documents = Transaction.objects.filter(buyorder__coin_id=coinId,date__gte=date_from)
        price = []
        if created_documents.count()==0:
            return Response(json.dumps({"max":"...","min":"..."}))
        else:
            for i in created_documents:
                price.append(i.price)
            maxprice=str(max(price))
            minprice=str(min(price))
            return Response(json.dumps({"max":minprice,"min":maxprice}))


class WQuery(APIView):
    def post(self, request):
        user = request.POST.get('user')
        coin = request.POST.get('coin')
        try:
            withdrawl = Withdrawl.objects.get(user_id=user,coin_id=coin,flag=0)
            response = txnDetail(withdrawl.tranx_id)
            if response.data != 'null':
                try:
                    ucoin = User_coin.objects.get(coin_id=coin, user_id=user)
                    ucoin.balance = float(ucoin.balance)-float(withdrawl.amount)
                    ucoin.save()
                except User_coin.DoesNotExist:
                    return Response(json.dumps({'message': 'User coin does not exist'}))
                withdrawl.flag = 1
                withdrawl.save()
            else:
                return Response(json.dumps({'message': 'Transaction under process'}))
        except Withdrawl.DoesNotExist:
            return Response(json.dumps({'message': 'All updated'}))
        return Response(json.dumps({'message': 'ok'}))

class DQuery(APIView):
    def post(self, request):
        user = request.POST.get('user')
        coin = request.POST.get('coin')
        try:
            deposite = Deposite.objects.get(user_id=user,coin_id=coin,flag=0)
            response = txnDetail(deposite.tranx_id)
            if response.data != 'null':
                try:
                    ucoin = User_coin.objects.get(coin_id=coin, user_id=user)
                    ucoin.balance = float(ucoin.balance) + float(deposite.amount)
                    ucoin.save()
                except:
                    ucoin = User_coin(coin_id=coin, user_id=user,balance=deposite.amount,lock_balance=0)
                    ucoin.save()
                deposite.flag = 1
                deposite.save()
            else:
                return Response(json.dumps({'message': 'Transaction under process'}))
        except Deposite.DoesNotExist:
            return Response(json.dumps({'message': 'All done'}))
        return Response(json.dumps({'message': 'ok'}))

class TQuery(APIView):
    def post(self, request):
        user = request.POST.get('user')
        coin = request.POST.get('coin')
        try:
            transfer = Transfer.objects.get(user_id=user,coin_id=coin,flag=0)
            response = txnDetail(transfer.tranx_id)
            if response.data != 'null':
                try:
                    ucoin = User_coin.objects.get(coin_id=coin, user_id=user)
                    ucoin.balance = float(ucoin.balance)-float(transfer.amount)
                    ucoin.save()
                except User_coin.DoesNotExist:
                    return Response(json.dumps({'message': 'ok'}))
                transfer.flag = 1
                transfer.save()
            else:
                return Response(json.dumps({'message': 'Transaction under process'}))
        except Transfer.DoesNotExist:
            return Response(json.dumps({'message': 'All done'}))
        return Response(json.dumps({'message': 'ok'}))
