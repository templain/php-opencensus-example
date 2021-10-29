# coding: utf-8

import django_filters
from rest_framework import viewsets, filters

from .models import User, Entry
from .serializer import UserSerializer, EntrySerializer
from django.shortcuts import get_object_or_404
from rest_framework.response import Response
import logging

class UserViewSet(viewsets.ViewSet):
    def list(self, request):
        queryset = User.objects.all()
        serializer = UserSerializer(queryset, many=True)
        return Response(serializer.data)

    def retrieve(self, request, pk=None):
        queryset = User.objects.all()
        user = get_object_or_404(queryset, pk=pk)
        serializer = UserSerializer(user)
        return Response(serializer.data)

class EntryViewSet(viewsets.ModelViewSet):
    def list(self, request):
        queryset = Entry.objects.all()
        serializer = EntrySerializer(queryset, many=True)
        return Response(serializer.data)

    def retrieve(self, request, pk=None):
        queryset = Entry.objects.all()
        entry = get_object_or_404(queryset, pk=pk)
        serializer = EntrySerializer(entry)
        return Response(serializer.data)
