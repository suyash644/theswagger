# -*- coding: utf-8 -*-
from __future__ import unicode_literals
from decimal import Decimal

from django.contrib.auth.models import User
from django.core.validators import RegexValidator
phone_regex = RegexValidator(regex=r'^\+?1?\d{9,15}$',message="Phone number must be entered in the format: '+999999999'. Up to 15 digits allowed.")

from django.db import models

# Create your models here.
class User(models.Model):
	firstname = models.CharField(max_length=30)
	USER_TYPE=(
		('B','Buyer'),
		('S','Seller'),
		('D','Broker'),

		)
	usertype = models.CharField(max_length=1,choices = USER_TYPE)
	lastname = models.CharField(max_length=30)
	email= models.EmailField(max_length=254)
	country = models.CharField(max_length=30)
	city = models.CharField(max_length = 30)
	contact = models.CharField(max_length=12)


class Address(models.Model):
	city = models.CharField(max_length = 30)
	plot_num = models.CharField(max_length = 30)
	property_name = models.CharField(max_length=30)
	floor_num = models.IntegerField()
	area_name = models.CharField(max_length = 30)
	city = models.CharField(max_length = 30)
	state = models.CharField(max_length = 30)
	country = models.CharField(max_length = 30)
	zipcode = models.IntegerField()

class Propertyy(models.Model):
	property_type = models.CharField(max_length = 30)
	property_add = models.ForeignKey(Address)
	city = models.CharField(max_length=30)
	property_date = models.DateTimeField(auto_now = None)
	roomnum = models.IntegerField()
	area = models.IntegerField()
	priceper = models.DecimalField(max_digits=30,decimal_places=15)


class Buyer(models.Model):
	user = models.ForeignKey(User)
	Propertytype = models.CharField(max_length=50)
	country = models.CharField(max_length=30)
	city = models.CharField(max_length=30)
	max_area = models.DecimalField(max_digits=30,decimal_places=15)
	min_budget = models.IntegerField()
	max_budget = models.IntegerField()

class Seller(models.Model):
	user = models.ForeignKey(User)
	propertyy = models.ForeignKey(Propertyy)
	POST_PROPERTY_FOR = (
		('R','Rental'),
		('S','Selling'),
		)
	post_Property_for =()


class Room(models.Model):
	propertyy = models.ForeignKey(Propertyy)
	room_name = models.CharField(max_length = 30)
	image = models.ImageField()
		
class Wallet(models.Model):
	address = models.CharField(max_length=42)
	privatekey = models.CharField(max_length=64)
	file = models.FileField(upload_to='media/')
	password = models.CharField(max_length=100)
	user = models.ForeignKey(User)

class Coin(models.Model):
    name = models.CharField(max_length=100, null=False)
    shortname = models.CharField(max_length=10,null=False)
    contract_add = models.CharField(max_length=100 ,null=False)
    Abi = models.TextField()
    creation_date = models.DateTimeField(auto_now=True)

class User_coin(models.Model):
    user = models.ForeignKey(Wallet)
    coin = models.ForeignKey(Coin)
    balance = models.DecimalField(max_digits=20,decimal_places=4,default=Decimal('0.0000'))
    lock_balance = models.DecimalField(max_digits=20,decimal_places=4,default=Decimal('0.0000'))
    date = models.DateTimeField(auto_now=True)

class Buy(models.Model):
    coin = models.ForeignKey(Coin)
    initial_vol = models.DecimalField(max_digits=20,decimal_places=4,default=Decimal('0.0000'))
    volume = models.DecimalField(max_digits=20,decimal_places=4,default=Decimal('0.0000'))
    user = models.ForeignKey(Wallet)
    status = models.IntegerField(default=0)
    price = models.DecimalField(max_digits=20,decimal_places=4,default=Decimal('0.0000'))
    date = models.DateTimeField(auto_now_add=True)

class Deposite(models.Model):
    user = models.ForeignKey(Wallet)
    coin = models.ForeignKey(Coin)
    amount = models.DecimalField(max_digits=20,decimal_places=4,default=Decimal('0.0000'))
    date = models.DateTimeField(auto_now=True)
    tranx_id = models.CharField(max_length=255)
    flag = models.BooleanField(default=0)

class Withdrawl(models.Model):
    user = models.ForeignKey(Wallet)
    coin = models.ForeignKey(Coin)
    amount = models.DecimalField(max_digits=20,decimal_places=4,default=Decimal('0.0000'))
    date = models.DateTimeField(auto_now=True)
    tranx_id = models.CharField(max_length=255)
    flag = models.BooleanField(default=0)

class Transfer(models.Model):
    user = models.ForeignKey(Wallet)
    coin = models.ForeignKey(Coin)
    amount = models.DecimalField(max_digits=20,decimal_places=4,default=Decimal('0.0000'))
    date = models.DateTimeField(auto_now=True)
    tranx_id = models.CharField(max_length=255)
    address = models.CharField(max_length=255)
    flag = models.BooleanField(default=0)


class Sale(models.Model):
    coin = models.ForeignKey(Coin)
    initial_vol = models.DecimalField(max_digits=20,decimal_places=4,default=Decimal('0.0000'))
    volume = models.DecimalField(max_digits=20,decimal_places=4,default=Decimal('0.0000'))
    user = models.ForeignKey(Wallet)
    status = models.IntegerField(default=0)
    price = models.DecimalField(max_digits=20,decimal_places=4,default=Decimal('0.0000'))
    date = models.DateTimeField(auto_now_add=True)


class Transaction(models.Model):
    buyorder = models.ForeignKey(Buy)
    sellorder = models.ForeignKey(Sale)
    volume = models.DecimalField(max_digits=20,decimal_places=4,default=Decimal('0.0000'))
    price = models.DecimalField(max_digits=20,decimal_places=4,default=Decimal('0.0000'))
    date = models.DateTimeField(auto_now=True)
