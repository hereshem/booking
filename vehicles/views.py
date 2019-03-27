from django.shortcuts import render

# Create your views here.
from vehicles.forms import ScheduleForm
from vehicles.models import Schedule, Seat


def schedule_index(req):
    schedules = Schedule.objects.filter(active=True)
    return render(req, "vehicles/schedule.html", {"items":schedules})


def schedule_detail(req, id):
    schedule = Schedule.objects.get(id=id)
    return render(req, "vehicles/schedule_detail.html", {"item":schedule})


def add_schedule(req):
    if req.method == "POST":
        form = ScheduleForm(req.POST)
        if form.is_valid():
            schedule = form.save(commit=False)
            schedule.save()
            seat_names = schedule.vehicle.seat_template.seat_name.split(",")
            seat_prices = schedule.vehicle.seat_template.seat_price.split(",")
            for index, seat in enumerate(seat_names):
                s = Seat()
                s.schedule = schedule
                s.name = seat
                s.price = seat_prices[index]
                s.save()
            return redirect("/")
    else:
        form = ScheduleForm()

    return render(req, "vehicles/add_schedule.html", {"form": form})


