
<div class="header">
    <i class="fa fa-angle-left" ng-click="previous()"></i>
    <span>{{month.format("MMMM, YYYY")}}</span>
    <i class="fa fa-angle-right" ng-click="next()"></i>
</div>
<div class="week names">
    <span class="day">Sun</span>
    <span class="day">Mon</span>
    <span class="day">Tue</span>
    <span class="day">Wed</span>
    <span class="day">Thu</span>
    <span class="day">Fri</span>
    <span class="day">Sat</span>
</div>
<div class="week" ng-repeat="week in weeks">
   <div class="day" ng-class="{ today: day.isToday, 'different-month': !day.isCurrentMonth, selected:day.date.isSame(selected) }" ng-click="select(day)" ng-repeat="day in week.days">
				<div class="small-12 columns">
					{{day.number}} 
					</div>
				<div class="small-12 columns">
				<a class="calendar-event-listing" href="/mylccc/day?d={{day.full}}"></a>
		</div>
</div>
</div>