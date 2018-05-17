<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reservation completed</title>
  </head>
  <body>
    <h2>Hi {!! $reservation->name!!},</h2>

  <p>Thank you for making a reservation at our restaurant.</p>
  <p>
  Will be awaiting for you on {!! $reservation->date!!} at {!!$reservation->time!!}.
  There will be a table ready for {!! $reservation->number_of_persons!!}.</p>

  If you have any questions or want to make changes for your reservation please contact us.

  See you soon!
  </body>
</html>
