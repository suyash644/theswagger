# -*- coding: utf-8 -*-
# Generated by Django 1.11 on 2018-03-20 05:23
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('propy', '0001_initial'),
    ]

    operations = [
        migrations.AlterField(
            model_name='wallet',
            name='file',
            field=models.FileField(upload_to='media/'),
        ),
    ]
