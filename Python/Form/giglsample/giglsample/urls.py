from django.contrib import admin
from django.urls import path, include
from authentication import views

urlpatterns = [
    path('admin/', admin.site.urls),
    path('signup/', views.signup, name='signup'),
    path('login/', views.user_login, name='login'),
    path('home/', views.home, name='home'),
]