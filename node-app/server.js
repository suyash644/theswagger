

// 'use-strict';

const express = require('express');
const app = express();
const bodyParser = require('body-parser');
var Tx = require('ethereumjs-tx');
var Wallet = require('ethereumjs-wallet');
const keythereum = require('keythereum');
const cors = require('cors');
const fs= require('fs');
var Web3 = require('web3');
var web3 = new Web3();
var precision = 1000000000000000000
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
app.use(cors());

web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));


var abiii = [
        {
                "constant": true,
                "inputs": [],
                "name": "decimals",
                "outputs": [
                        {
                                "name": "",
                                "type": "uint256"
                        }
                ],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
        },
        {
                "constant": true,
                "inputs": [
                        {
                                "name": "_owner",
                                "type": "address"
                        },
                        {
                                "name": "_spender",
                                "type": "address"
                        }
                ],
                "name": "allowance",
                "outputs": [
                        {
                                "name": "remaining",
                                "type": "uint256"
                        }
                ],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
        },
        {
                "constant": true,
                "inputs": [],
                "name": "totalSupply",
                "outputs": [
                        {
                                "name": "",
                                "type": "uint256"
                        }
                ],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
        },
        {
                "constant": true,
                "inputs": [],
                "name": "symbol",
                "outputs": [
                        {
                                "name": "",
                                "type": "string"
                        }
                ],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
        },
        {
                "constant": true,
                "inputs": [],
                "name": "owner",
                "outputs": [
                        {
                                "name": "",
                                "type": "address"
                        }
                ],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
        },
        {
                "constant": true,
                "inputs": [],
                "name": "name",
                "outputs": [
                        {
                                "name": "",
                                "type": "string"
                        }
                ],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
        },
        {
                "constant": true,
                "inputs": [],
                "name": "initialSupply",
                "outputs": [
                        {
                                "name": "",
                                "type": "uint256"
                        }
                ],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
        },
        {
                "constant": true,
                "inputs": [
                        {
                                "name": "_owner",
                                "type": "address"
                        }
                ],
                "name": "balanceOf",
                "outputs": [
                        {
                                "name": "balance",
                                "type": "uint256"
                        }
                ],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
        },
        {
                "inputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "constructor"
        },
        {
                "constant": false,
                "inputs": [
                        {
                                "name": "_to",
                                "type": "address"
                        },
                        {
                                "name": "_value",
                                "type": "uint256"
                        }
                ],
                "name": "transfer",
                "outputs": [
                        {
                                "name": "",
                                "type": "bool"
                        }
                ],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
        },
        {
                "constant": false,
                "inputs": [
                        {
                                "name": "newOwner",
                                "type": "address"
                        }
                ],
                "name": "transferOwnership",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
        },
        {
                "constant": false,
                "inputs": [
                        {
                                "name": "_spender",
                                "type": "address"
                        },
                        {
                                "name": "_subtractedValue",
                                "type": "uint256"
                        }
                ],
                "name": "decreaseApproval",
                "outputs": [
                        {
                                "name": "success",
                                "type": "bool"
                        }
                ],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
        },
        {
                "anonymous": false,
                "inputs": [
                        {
                                "indexed": true,
                                "name": "owner",
                                "type": "address"
                        },
                        {
                                "indexed": true,
                                "name": "spender",
                                "type": "address"
                        },
                        {
                                "indexed": false,
                                "name": "value",
                                "type": "uint256"
                        }
                ],
                "name": "Approval",
                "type": "event"
        },
        {
                "anonymous": false,
                "inputs": [
                        {
                                "indexed": true,
                                "name": "burner",
                                "type": "address"
                        },
                        {
                                "indexed": false,
                                "name": "value",
                                "type": "uint256"
                        }
                ],
                "name": "Burn",
                "type": "event"
        },
        {
                "anonymous": false,
                "inputs": [
                        {
                                "indexed": true,
                                "name": "previousOwner",
                                "type": "address"
                        },
                        {
                                "indexed": true,
                                "name": "newOwner",
                                "type": "address"
                        }
                ],
                "name": "OwnershipTransferred",
                "type": "event"
        },
        {
                "anonymous": false,
                "inputs": [
                        {
                                "indexed": true,
                                "name": "from",
                                "type": "address"
                        },
                        {
                                "indexed": true,
                                "name": "to",
                                "type": "address"
                        },
                        {
                                "indexed": false,
                                "name": "value",
                                "type": "uint256"
                        }
                ],
                "name": "Transfer",
                "type": "event"
        },
        {
                "constant": false,
                "inputs": [
                        {
                                "name": "_from",
                                "type": "address"
                        },
                        {
                                "name": "_to",
                                "type": "address"
                        },
                        {
                                "name": "_value",
                                "type": "uint256"
                        }
                ],
                "name": "transferFrom",
                "outputs": [
                        {
                                "name": "",
                                "type": "bool"
                        }
                ],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
        },
        {
                "constant": false,
                "inputs": [
                        {
                                "name": "_spender",
                                "type": "address"
                        },
                        {
                                "name": "_value",
                                "type": "uint256"
                        }
                ],
                "name": "approve",
                "outputs": [
                        {
                                "name": "",
                                "type": "bool"
                        }
                ],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
        },
        {
                "constant": false,
                "inputs": [
                        {
                                "name": "_spender",
                                "type": "address"
                        },
                        {
                                "name": "_addedValue",
                                "type": "uint256"
                        }
                ],
                "name": "increaseApproval",
                "outputs": [
                        {
                                "name": "success",
                                "type": "bool"
                        }
                ],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
        },
        {
                "constant": false,
                "inputs": [
                        {
                                "name": "_value",
                                "type": "uint256"
                        }
                ],
                "name": "burn",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
        }
];

// contract Address

// const contractAddress = "0x5a3F77eB2B4aa66E0267287204bf8300D6c20954";

// const contractInstance = web3.eth.contract(abi).at(contractAddress);

// Rest API for getting Balance

app.post('/api/getBalance', (request, response)=>{
        const account= request.body.ether_address;

        contractInstance.balanceOf(account,function(err, res){
                 response.json({"balance":res.toString(10)});
        });

});


// Rest API for Transfer from Owner Account to Other Account

app.post('/api/transferTo', (request, response)=>{

        const from_account=request.body.from;
        const to_account=request.body.to;
        const value = request.body.value;
	const contractAddress = request.body.contractAddress;
	const abi = request.body.abiArray;
	const contractInstance = web3.eth.contract(JSON.parse(abi)).at(contractAddress);
        web3.personal.unlockAccount(from_account,request.body.password);

        contractInstance.transfer(to_account,value, {from: from_account, gas:95000}, function(err, res){
	if(err){
		response.json({txnHash:"Null",error:err});
		}else{
                response.json({txnHash: res,"error":"Null"});
			}
        });

})


// Rest API for Approve

app.post('/api/approve', (request, response)=>{
   const from_account=request.body.from;
   const spender=request.body.spender;
   const value=request.body.value;

   web3.personal.unlockAccount(from_account,request.body.password);

   contractInstance.approve(spender, value,{from : from_account, gas: 95000}, function(err, res){
           response.json({"txn": res});
   });
});


// Rest API for transfer From

app.post('/api/transferFrom', (request, response)=>{

        const from_account=request.body.from;
        const to_account=request.body.to;
        const value = request.body.value;
        const owner_account = request.body.account;

        web3.personal.unlockAccount(owner_account,request.body.password);

        contractInstance.transferFrom(from_account,to_account,value, {from: owner_account, gas:95000}, function(err, res){
                response.json({"txn": res});
        });

});




// Rest API for increaseApproval

app.post('/api/increaseApproval', (request, response)=>{
   const from_account=request.body.from;
   const spender=request.body.spender;
   const value=request.body.value;

   web3.personal.unlockAccount(from_account,request.body.password);

   contractInstance.increaseApproval(spender, value,{from : from_account, gas: 95000}, function(err, res){
           response.json({"txn": res});
   });
});


// Rest API for decreaseApproval

app.post('/api/decreaseApproval', (request, response)=>{
   const from_account=request.body.from;
   const spender=request.body.spender;
   const value=request.body.value;

   web3.personal.unlockAccount(from_account,request.body.password);

   contractInstance.decreaseApproval(spender, value,{from : from_account, gas: 95000}, function(err, res){
           response.json({"txn": res});
   });
});

app.get('/api/createEtherAccount', (request, response)=>{

 const account= web3.personal.newAccount("testing");

 response.json(account);

});


app.post('/api/getEtherBalance', (request,response)=>{
         console.log("test");
         var address = request.body.ether_address;
         var balance = web3.eth.getBalance(address);
         //console.log(balance);
       response.json({"balance":balance/precision});
});

app.post('/api/historyTransaction',(request,response)=>{
        console.log("test");
var history = web3.eth.getTransactionCount(address);
        var transactioncount = web3.eth.getTransactionsByAccount(address);
        console.log(history);
    response.json({"history":history,"transactioncount":transactioncount});
        });


const hostname = 'localhost';
const port = 3004;

app.listen(port, hostname, () => {
    console.log(`server is running at http://${hostname}:${port}`);
})



//rest API for ether transfer
app.post('/api/sendTransaction',(request,response)=>{
    var to = request.body.to;
    var from = request.body.from;
    var value = request.body.value;
    var password = request.body.password;
    web3.personal.unlockAccount(from,password,function(err,data){
      if(err!=null){
        console.log(err);
      }
      web3.eth.sendTransaction({
        from:from,
        to:to,
        value:value,
      },function(err,resp){
        if(err!=null){
          console.log(err);
        }
        response.json({"response":resp});
      });
    });
});

// Rest API for Ether Transfer
app.post('/api/sendEtherTransaction',(request, response)=>{
        const from_account=request.body.from;
        const to_account=request.body.to;
        const valueInEther = request.body.value;
        const pass = request.body.pass;
        const value = web3.toWei(valueInEther, 'ether');

    
    web3.personal.unlockAccount(from_account,pass);

        web3.eth.sendTransaction({from: from_account, to:to_account, value:value, gas:30000},function(err, res){
                if(err){
			console.log(err);
                       response.json({txnHash:"Null",error:err});
                }else{
			console.log(res);
                        response.json({txnHash:res,error:"Null"});
                }
        });

});

// Rest API for Getting Reciept

app.post('/api/getRecieptFromTransaction',(request, response)=>{
        const txnHash = request.body.txnHash;

        var receipt = web3.eth.getTransactionReceipt(txnHash);
        if(!receipt){
                response.json({receipt:null});
        }else{
                response.json({receipt:receipt});
        }
});

app.post('/api/getRecieptFromTransaction',(request, response)=>{
        const txnHash = request.body.txnHash;

        var receipt = web3.eth.getTransactionReceipt(txnHash);
        if(!receipt){
                response.json({receipt:null});
        }else{
                response.json({receipt:receipt});
        }
});
app.post('/api/getTransactionStatus',(request, response)=>{
        const txnHash = request.body.txnHash;

        var receipt = web3.eth.getTransaction(txnHash);
        if(!receipt){
                response.json({receipt:null});
        }else{
                response.json({receipt:receipt.blockNumber});
        }
});


app.post('/api/importFile',(request,response)=>{
        const prik = request.body.prik;
        const pass = request.body.pass;
        //if (typeof web3.eth.accounts === 'undefined'){
        var v =web3.personal.importRawKey(prik,pass);
                response.json(v);
        //}else{
                response.json("account already exist");
        //      }
        })
