from rest_framework import serializers
from rest_framework.validators import UniqueValidator
from django.contrib.auth.models import User
from propy.models import Coin, Buy, Sale, User_coin, Transaction


class UserSerializer(serializers.ModelSerializer):
    email = serializers.EmailField(
            required=True,
            validators=[UniqueValidator(queryset=User.objects.all())]
            )
    username = serializers.CharField(
            validators=[UniqueValidator(queryset=User.objects.all())]
            )
    password = serializers.CharField(min_length=8)

    def create(self, validated_data):
        user = User.objects.create_user(validated_data['username'], validated_data['email'],
             validated_data['password'])
        return user

    class Meta:
        model = User
        fields = ('id', 'username', 'email', 'password')


class Coinserializers(serializers.ModelSerializer):
    class Meta(object):
        model = Coin
        fields = ('id','name', 'shortname', 'contract_add', 'Abi', 'creation_date')


class Buyserializers(serializers.ModelSerializer):
    class Meta(object):
        model = Buy
        fields = ('id','coin', 'initial_vol','volume', 'user', 'price' ,'date')



class Sallserializers(serializers.ModelSerializer):
    class Meta(object):
        model = Sale
        fields = ('id','coin', 'initial_vol','volume', 'user', 'price' ,'date')



class UserCoinserializers(serializers.ModelSerializer):
    class Meta(object):
        model = User_coin
        fields = ('id','balance','lock_balance','date','coin','user')


class Transsactionserializers(serializers.ModelSerializer):
    class Meta(object):
        model = Transaction
        fields = ('buyorder','sellorder','volume','price','date')
