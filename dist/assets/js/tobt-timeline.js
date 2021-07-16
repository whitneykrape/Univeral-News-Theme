// Each! 
$eventsDebug = {};
$timeline = document.getElementById("tob-timeline_number");
$timelineStage = $timeline.querySelector('.tobt__stage');
$timelineEvents = $timeline.querySelector('.tobt__events');
$timelineEventFirst = $timelineEvents.firstElementChild;
$timelineStage.querySelector('.tobt__slide').innerHTML = $timelineEvents.firstElementChild.innerHTML;
$eventsDebug.firstEvent = $timelineEventFirst;
console.log('EventsDebug');
console.log($eventsDebug);