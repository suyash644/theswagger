from django.conf.urls import url

from propy import views
# from test import test

urlpatterns = [
    url(r'^signup/', views.UserList.as_view()),
    url(r'^GetPk/', views.Privatekey.as_view()),
    url(r'^GetAcDetail/', views.Getadd_via_pk.as_view()),
    url(r'^kyc/', views.AddKyc.as_view()),
    url(r'^Lastprice/', views.Last_price.as_view()),
    url(r'^Coin/', views.CoinApi.as_view()),
    url(r'^Buy/', views.BuyApi.as_view()),
    url(r'^Sale/', views.SaleApi.as_view()),
    url('^sendMessages/',views.sendMessages.as_view()),
    url('^FeedsData/',views.FeedsData.as_view()),
    url('^UserCoin/',views.UserCoin.as_view()),
    url('^UserCoinMain/',views.UserCoinMain.as_view()),
    url('^Query/',views.Query.as_view()),
    url('^DQuery/',views.DQuery.as_view()),
    url('^TQuery/',views.TQuery.as_view()),
    url('^WQuery/',views.WQuery.as_view()),
    url('^CoinTransacton/',views.Transacton.as_view()),
    url('^UserTransacton/',views.UserTransacton.as_view()),
    url('^Buyorder/',views.Buyorder.as_view()),
    url('^Saleorder/',views.Sellorder.as_view()),
    url('^My_open_order/',views.user_open_order.as_view()),
    url('^DepositeList/',views.DepositeList.as_view()),
    url('^WithdrawlList/',views.WithdrawlList.as_view()),
    url('^TransferList/',views.TransferList.as_view()),
    url('^GetDet/',views.GetDet.as_view()),
    # url('^Test/',test),
]
