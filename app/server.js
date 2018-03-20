'use-strict';

const express = require('express');
const app = express();
const bodyParser = require('body-parser');
var Tx = require('ethereumjs-tx');
var Wallet=require('ethereumjs-wallet');
//var BigNumber = require('bignumber.js');
const cors = require('cors');
var Web3 = require('web3');
var web3 = new Web3();
var precision = 1000000000000000000;
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
app.use(cors());
web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
 

var abi = [
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



app.post('/api/getBalance', (request, response)=>{
	const contractAddress=request.body.contractAddress;
	//const contractAddress='0x1530df3e1c69501d4ecb7e58eb045b90de158873';
	const abiArray=request.body.abiArray;
	var abi=JSON.parse(abiArray);
	const account=request.body.ether_address;
	const contractInstance=new web3.eth.Contract(abi,contractAddress);
	var precision = 100000000;
	var res = contractInstance.methods.balanceOf(account).call().then(function(data){
	console.log('data',data);
	response.json({"bal":data/precision})}
		);
	})

//rest API for \Transfer from Owner Account to Other Account

app.post('/api/transferTo', (request, response)=>{
	const contractAddress=request.body.contractAddress;
        const abiArray=request.body.abiArray;
	const abi = JSON.parse(abiArray);
	const from_account = request.body.from;
        const contractInstance=new web3.eth.Contract(abi,contractAddress,{gasPrice: '9500', from: from_account});
	const to_account=request.body.to;
	const value = request.body.value;
	web3.eth.personal.unlockAccount(from_account,request.body.password);
	contractInstance.methods.transfer(to_account,web3.utils.toWei(value)).send().then(function(data){
		response.json({"txnHash":data})
		}).catch(function(error){
		var vall = error.message;
		response.json(String(vall));
		console.log(vall);
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

	web3.eth.personal.unlockAccount(owner_account,request.body.password);

	contractInstance.transferFrom(from_account,to_account,value, {from: owner_account, gas:95000}, function(err, res){
		if(err){
		response.json({"err":err});
	}else{
		response.json({"txn": res});
	}
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

 const account=	web3.eth.personal.newAccount("testing",function(err,data){

response.json(data);
});

 //response.json(account);

});
var keythereum = require("keythereum");

app.post('/api/getEtherBalance', (request,response)=>{
         var address = request.body.ether_address;
         var balance = web3.eth.getBalance(address).then(function(result){ 
        response.json({"bal":result/precision});
	});
});



app.post('/api/generateNew',function(request,response){
		var pass = request.body.pass;
		var account = web3.eth.accounts.create();
		var address=account.address;
		var prik = account.privateKey;
		var pk = Buffer.from(prik.substr(2),'hex');
		var key = Wallet.fromPrivateKey(pk);
		var name= key.getV3Filename();
		var data = web3.eth.accounts.encrypt(prik,pass);
		console.log(data);
		response.json({"address":address,"data":data,"prik":prik,"name":name});
		})

app.post('/api/genn/',function(request,response){
	var pass=request.body.pass;
	var data = request.body.pubk;
	var da = data.toLowerCase();
	var key = Buffer.from(da, 'hex');
	console.log(key);
	//var wallet = Wallet.fromPrivateKey(key);
	//var k =  wallet.toV3String(pass);
	//var v = web3.eth.accounts.wallet.decrypt(k, pass);
})

app.post('/api/generatePk',function(request,response){
	var pass = request.body.pass;
	var data=request.body.pubk;
	try{
	var v = web3.eth.accounts.decrypt(data,pass);
	var privateKey=v.privateKey;
	var address = v.address;
	response.json({"data":data,"privateKey":privateKey,"address":address});
	}catch(error){
	console.log(error.message);
	response.json({"error":error.message});
	}
	})

// Api for privateKey to Account
app.post('/api/unlockTPk',function(request,response){
        var prik = request.body.prik;
	var det=web3.eth.accounts.privateKeyToAccount(prik);
response.json({"det":det});

        })




app.post('/api/checkKey',(request, response)=>{
	var prik = request.body.prik;
	var password=request.body.password;
	var datadir = "./data";
	var address=prik;
	var keyObject = keythereum.importFromFile(address, datadir);
	if(keyObject){
	console.log('ok');
	}
	else{
	console.log('no');
	}
//var privateKey = keythereum.recover(password, keyObject);
response.json(prik);

})

app.post('/api/historyTransaction',(request,response)=>{
	var history = web3.eth.getTransactionCount(address);
	var transactioncount = web3.eth.getTransactionsByAccount(address);
	console.log(history);
    	response.json({"history":history,"transactioncount":transactioncount});
	});


const hostname = 'localhost';
const port = 3001;

app.listen(port, hostname, () => {
    console.log(`server is running at http://${hostname}:${port}`);
})



//rest API for ether transfer
app.post('/api/sendTransaction',(request,response)=>{
    var to = request.body.to;
    var from = request.body.from;
    const value = request.body.value;
    var password = request.body.password;
    web3.eth.personal.unlockAccount(from,password,function(err,data){
      if(err!=null){
        console.log(err);
      }
      web3.eth.sendTransaction({
        from:from,
        to:to,
        value:value,
	gas:30000,
      	},function(err,resp){
        if(err!=null){
          response.json({"err":err})
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
	const value = web3.utils.toWei(valueInEther, 'ether');
	web3.eth.personal.unlockAccount(from_account,pass);
	web3.eth.sendTransaction({from: from_account, to:to_account, value:value, gas:30000},function(res,err){
	response.json({txnHash:res});
        console.log(res);		
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
		response.json({receipt:receipt});
	}
});


app.get('/api/generateKey1',(request, response)=>{
var datadir = "/root/.ethereum";
var pubk = web3.eth.accounts.create();
response.json(pubk);

})

app.post('/api/importFile',(request,response)=>{
	const prik = request.body.prik;
	const pass = request.body.pass;
	var v=web3.eth.personal.importRawKey(prik,pass).then(function(data){
	response.json(data);
	})
	
	})

// contract Address 

// const contractAddress = "0xbB5C79ae61668e24d616655Bf0f1Ee6f22028186";

// const contractInstance = web3.eth.contract(abi).at(contractAddress);

// // Rest API for getting Balance

// app.post('/api/getBalance', (request, response)=>{
// 	const account= request.body.ether_address;
	
// 	contractInstance.balanceOf(account,function(err, res){
// 		 response.json({"balance":res.toString(10)});
// 	});
	
// });


// // Rest API for Transfer from Owner Account to Other Account

// app.post('/api/transferTo', (request, response)=>{

// 	const from_account=request.body.from;
// 	const to_account=request.body.to;
// 	const value = request.body.value;
	
// 	web3.personal.unlockAccount(from_account,request.body.password);
	
// 	contractInstance.transfer(to_account,value, {from: from_account, gas:95000}, function(err, res){
// 		response.json({"txn": res});
// 	});

// })


// // Rest API for Approve

// app.post('/api/approve', (request, response)=>{
//    const from_account=request.body.from;
//    const spender=request.body.spender;
//    const value=request.body.value;
   
//    web3.personal.unlockAccount(from_account,request.body.password);
	
//    contractInstance.approve(spender, value,{from : from_account, gas: 95000}, function(err, res){
// 	   response.json({"txn": res});
//    });
// });


// // Rest API for transfer From

// app.post('/api/transferFrom', (request, response)=>{

// 	const from_account=request.body.from;
// 	const to_account=request.body.to;
// 	const value = request.body.value;
// 	const owner_account = request.body.account;
	
// 	web3.personal.unlockAccount(owner_account,request.body.password);
	
// 	contractInstance.transferFrom(from_account,to_account,value, {from: owner_account, gas:95000}, function(err, res){
// 		response.json({"txn": res});
// 	});

// });




// // Rest API for increaseApproval

// app.post('/api/increaseApproval', (request, response)=>{
//    const from_account=request.body.from;
//    const spender=request.body.spender;
//    const value=request.body.value;
   
//    web3.personal.unlockAccount(from_account,request.body.password);
	
//    contractInstance.increaseApproval(spender, value,{from : from_account, gas: 95000}, function(err, res){
// 	   response.json({"txn": res});
//    });
// });


// // Rest API for decreaseApproval

// app.post('/api/decreaseApproval', (request, response)=>{
//    const from_account=request.body.from;
//    const spender=request.body.spender;
//    const value=request.body.value;
   
//    web3.personal.unlockAccount(from_account,request.body.password);
	
//    contractInstance.decreaseApproval(spender, value,{from : from_account, gas: 95000}, function(err, res){
// 	   response.json({"txn": res});
//    });
// });

// app.get('/api/createEtherAccount', (request, response)=>{
	
//  const account=	web3.personal.newAccount("testing");

//  response.json(account);
	
// });


// app.post('/api/getEtherBalance', (request,response)=>{
//          console.log("test");
//          var address = request.body.ether_address;
//          var balance = web3.eth.getBalance(address);
//          //console.log(balance);
//        response.json({"balance":balance/precision});
// });

// app.post('/api/historyTransaction',(request,response)=>){
// 	console.log("test");
// 	var address = request.body.ether_address;
// 	var history = web3.eth.getTransactionCount(address);
// 	console.log(history);
//     response.json({"balance":history});
// 	});


// const hostname = 'localhost';
// const port = 3001;

// app.listen(port, hostname, () => {
//     console.log(`server is running at http://${hostname}:${port}`);
// })



// //rest API for ether transfer
// app.post('/api/sendTransaction',(request,response)=>{
//     var to = request.body.to;
//     var from = request.body.from;
//     var value = request.body.value;
//     var password = request.body.password;
//     web3.personal.unlockAccount(from,password,function(err,data){
//       if(err!=null){
//         console.log(err);
//       }
//       web3.eth.sendTransaction({
//         from:from,
//         to:to,
//         value:value,
//       },function(err,resp){
//         if(err!=null){
//           console.log(err);
//         }
//         response.json({"response":resp});
//       });
//     });
// });

// // Rest API for Ether Transfer
// app.post('/api/sendEtherTransaction',(request, response)=>{
// 	const from_account=request.body.from;
// 	const to_account=request.body.to;
// 	const valueInEther = request.body.value;
// 	const value = web3.toWei(valueInEther, 'ether');
	
// 	web3.personal.unlockAccount(from_account,"testing");

// 	web3.eth.sendTransaction({from: from_account, to:to_account, value:value, gas:30000},function(err, res){
// 		if(err){
// 			response.json({txnHash:null});
// 		}else{
// 			response.json({txnHash:res});
// 		}
// 	});
	  
// });

// // Rest API for Getting Reciept

// app.post('/api/getRecieptFromTransaction',(request, response)=>{
// 	const txnHash = request.body.txnHash;

// 	var receipt = web3.eth.getTransactionReceipt(txnHash);
// 	if(!receipt){
// 		response.json({receipt:null});
// 	}else{
// 		response.json({receipt:receipt});
// 	}
// });
