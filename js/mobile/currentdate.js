// Automatically Update Current & Final Date
$(document).ready(function() {
  var date=new Date(),
      end=new Date(),
      d=['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
      m=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
          
  function setDates() {      
    var day = d[date.getDay()],
        month = m[date.getMonth()],
        number = date.getDate(),
        year = date.getFullYear(),
        newYear = year+1;
        
    function chkMonth() {
      if(month != 'May') {
        return month+'.';
      } else return month;
    }
          
    var thisDay = [(day+','),chkMonth(),number].join(' ');
      
    $('#today').append(thisDay);
    
    var getEndMonth = /[A-Za-z]{3}/,
        getNumbers = /\d+/;
  
    var regex = /[A-Za-z]+\s\d+/,
        eventDate = $('li:last-child > div.program-mobile > p:last-child').html();
        eventDate = eventDate.match(regex).join('');
        
    var finalMonth = eventDate.match(getEndMonth).join(''),
        finalDate = eventDate.match(getNumbers).join('');
        
    function chkYr() {
      function chkEndMonth() {
        if(eMonth != 'May') {
          return eMonth+'.';
        } else return eMonth;
      }
      if(month == 'Nov' && finalMonth == 'Jan' || month == 'Dec' && finalMonth == 'Jan' || month == 'Dec' && finalMonth == 'Feb'){
        end.setFullYear(newYear,m.indexOf(finalMonth),finalDate);
        //console.log(end);
        var eDay = d[end.getDay()],
            eMonth = m[end.getMonth()],
            eNum = end.getDate();
        var endingDate = [(eDay+','),chkEndMonth(),(eNum+','),newYear].join(' ');
        $('#final-day').append(endingDate);
      } else {
        end.setFullYear(year,m.indexOf(finalMonth),finalDate);
        //console.log(end);
        var eDay = d[end.getDay()],
            eMonth = m[end.getMonth()],
            eNum = end.getDate();
        var eD = [(eDay+','),chkEndMonth(),eNum].join(' ');
        $('#final-day').append(eD);
      }
    }
    chkYr();
  }
  setDates();
});