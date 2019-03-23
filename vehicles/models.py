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
    travel = models.ForeignKey(Travel, on_delete=models.DO_NOTHING)
    created = models.DateTimeField(auto_now_add=True)
    modified = models.DateTimeField(auto_now=True)
    active = models.BooleanField(default=True)

    def __str__(self):
        return self.name

class Station:
    pass


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
    schedule = models.ForeignKey(Schedule, on_delete=models.DO_NOTHING)
    status = models.CharField(max_length=1, default="I", choices=[["I","Initial"],["S","Selected"],["B","Booked"],["P","Paid"],["C","Cancelled"]])
    price = models.DecimalField(max_digits=10, decimal_places=2, default=0)
    created = models.DateTimeField(auto_now_add=True)
    modified = models.DateTimeField(auto_now=True)
    active = models.BooleanField(default=True)

    def __str__(self):
        return self.name


class BookingUser(models.Model):
    user = models.OneToOneField(User, on_delete=models.CASCADE)
    address = models.CharField(max_length=250, blank=True)
    phone = models.CharField(max_length=250, blank=True)
    phone_verified = models.BooleanField(default=False)
    email_verified = models.BooleanField(default=False)

    def __str__(self):
        return self.user.username


class Booking(models.Model):
    user = models.ForeignKey(BookingUser, on_delete=models.DO_NOTHING, blank=True)
    remarks = models.TextField(blank=True)
    schedule = models.ForeignKey(Schedule, on_delete=models.DO_NOTHING)
    seat_names = models.CharField(max_length=250, blank=True)
    seat_count = models.IntegerField(default=1)
    sub_total = models.DecimalField(max_digits=10, decimal_places=2, default=0)
    discount = models.DecimalField(max_digits=10, decimal_places=2, default=0)
    total = models.DecimalField(max_digits=10, decimal_places=2, default=0)
    ticket = models.CharField(max_length=250, blank=True)
    status = models.CharField(max_length=1, default="B", choices=[["B","Booked"],["P","Paid"],["C","Cancelled"]])
    created = models.DateTimeField(auto_now_add=True)
    modified = models.DateTimeField(auto_now=True)
    active = models.BooleanField(default=True)

    def __str__(self):
        return str(self.id) + " - " + (self.user.user.username if self.user else self.remarks)
