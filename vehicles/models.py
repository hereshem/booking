from django.contrib.auth.models import User
from django.db import models

# Create your models here.


class Travel(models.Model):
    name = models.CharField(max_length=250)
    description = models.TextField(blank=True)
    address = models.TextField(blank=True)
    created = models.DateTimeField(auto_now_add=True)
    modified = models.DateTimeField(auto_now=True)
    active = models.BooleanField(default=True)

    def __str__(self):
        return self.name


class SeatTemplate(models.Model):
    name = models.CharField(max_length=250)
    photo = models.ImageField(upload_to='seat_template', blank=True)
    html = models.TextField()
    seat_count = models.IntegerField(default=0)
    seat_name = models.TextField()
    seat_price = models.TextField()
    created = models.DateTimeField(auto_now_add=True)
    modified = models.DateTimeField(auto_now=True)
    active = models.BooleanField(default=True)

    def __str__(self):
        return self.name


class Vehicle(models.Model):
    name = models.CharField(max_length=250)
    description = models.TextField(blank=True)
    plate_number = models.CharField(max_length=250)
    route = models.CharField(max_length=250)
    has_ac = models.BooleanField(default=True)
    photo = models.ImageField(upload_to='vehicle', blank=True)
    seat_template = models.ForeignKey(SeatTemplate, on_delete=models.DO_NOTHING)
    travel = models.ForeignKey(Travel, on_delete=models.CASCADE)
    created = models.DateTimeField(auto_now_add=True)
    modified = models.DateTimeField(auto_now=True)
    active = models.BooleanField(default=True)

    def __str__(self):
        return self.name


class Schedule(models.Model):
    name = models.CharField(max_length=250)
    vehicle = models.ForeignKey(Vehicle, on_delete=models.CASCADE)
    time = models.DateTimeField("Scheduled Time")
    route = models.CharField(max_length=250)
    created = models.DateTimeField(auto_now_add=True)
    modified = models.DateTimeField(auto_now=True)
    active = models.BooleanField(default=True)

    def __str__(self):
        return self.name


class Seat(models.Model):
    name = models.CharField(max_length=250)
    schedule = models.ForeignKey(Schedule, on_delete=models.CASCADE)
    status = models.CharField(max_length=10, choices=[["initial","initial"],["selected","selected"],["booked","booked"],["paid","paid"],["cancelled","cancelled"]])
    created = models.DateTimeField(auto_now_add=True)
    modified = models.DateTimeField(auto_now=True)
    active = models.BooleanField(default=True)

    def __str__(self):
        return self.name


class Booking(models.Model):
    name = models.CharField(max_length=250)
    address = models.CharField(max_length=250, blank=True)
    phone = models.CharField(max_length=250, blank=True)
    schedule = models.ForeignKey(Schedule, on_delete=models.CASCADE)
    user = models.ForeignKey(User, on_delete=models.CASCADE)

    created = models.DateTimeField(auto_now_add=True)
    modified = models.DateTimeField(auto_now=True)
    active = models.BooleanField(default=True)

    def __str__(self):
        return self.name
