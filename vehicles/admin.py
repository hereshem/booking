from django.contrib import admin
from . import models
# Register your models here.

admin.site.register([models.Booking])
admin.site.register(models.Schedule)
admin.site.register(models.Seat)
admin.site.register(models.SeatTemplate)
admin.site.register(models.Travel)
admin.site.register(models.Vehicle)
admin.site.register(models.BookingUser)
