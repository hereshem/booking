
from django.urls import path

from vehicles import views

app_name = "vehicles"

urlpatterns = [
    path('', views.schedule_index, name="schedule"),
    path('add_schedule/', views.add_schedule, name="add_schedule"),
    path('schedule/<int:id>/', views.schedule_detail, name="schedule_id"),
]
