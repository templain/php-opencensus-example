# coding: utf-8

from rest_framework import routers
from .views import UserViewSet, EntryViewSet


router = routers.DefaultRouter()
router.register(r'users', UserViewSet, basename='user')
router.register(r'entries', EntryViewSet, basename='entry')