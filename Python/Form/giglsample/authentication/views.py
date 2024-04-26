from django.shortcuts import render, redirect
from django.contrib.auth import login, authenticate
from .forms import SignUpForm, LoginForm
import requests
import base64

def signup(request):
    if request.method == 'POST':
        form = SignUpForm(request.POST)
        if form.is_valid():
            form.save()
            username = form.cleaned_data.get('username')
            raw_password = form.cleaned_data.get('password1')
            # Data to be sent to Node.js server
            data = {
                'username': username,
                'password': base64.b64encode(raw_password.encode()).decode()
            }
            # URL of the Node.js server
            node_server_url = 'http://localhost:3000/users/register'
            response = requests.post(node_server_url, json=data)
            # Check response status
            if response.status_code == 201:
                return redirect('home')
    else:
        form = SignUpForm()
    return render(request, 'authentication/signup.html', {'form': form})

def user_login(request):
    if request.method == 'POST':
        form = SignUpForm(request.POST)
        if form.is_valid():
            form.save()
            username = form.cleaned_data.get('username')
            raw_password = form.cleaned_data.get('password1')
            # Data to be sent to Node.js server
            data = {
                'username': username,
                'password': base64.b64encode(raw_password.encode()).decode()
            }
            # URL of the Node.js server
            node_server_url = 'http://localhost:3000/users/login'
            response = requests.post(node_server_url, json=data)
            # Check response status
            if response.status_code == 200:
                return redirect('home')
            # login(request, user)
    else:
        form = LoginForm()
    return render(request, 'authentication/login.html', {'form': form})

def home(request):
    return render(request, 'authentication/home.html')
