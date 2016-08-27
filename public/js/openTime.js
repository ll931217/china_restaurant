function open(id) {
  var date = new Date();
  var today = date.getDay();

  var days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

  var earlyOpenTime = new Date(date.getFullYear(), date.getMonth(), date.getDate(), 11, 30, 0, 0);
  var earlyCloseTime = new Date(date.getFullYear(), date.getMonth(), date.getDate(), 14, 0, 0, 0);

  var lateOpenTime = new Date(date.getFullYear(), date.getMonth(), date.getDate(), 17, 30, 0, 0);
  var lateCloseTime = new Date(date.getFullYear(), date.getMonth(), date.getDate(), 21, 30, 0, 0);

  if ((days[today] != 'Sunday') && ((date >= earlyOpenTime && date <= earlyCloseTime) || (date >= lateOpenTime && date <= lateCloseTime))) {
  	document.getElementById(id).innerHTML = '<p style="color: rgb(4, 190, 0); margin-top: 0">Hey! We are open right now!</p>';
  } else {
    document.getElementById(id).innerHTML = '<p style="color: red; margin-top: 0">Sorry, we are closed now. Please check our operating hours.</p>';
  }
  return true;
}
