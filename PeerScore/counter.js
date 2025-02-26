const needed = 120;
var timeleft;
var daysleft;
var date = new Date().toISOString().split("T")[0];
date = parseInt(date.split('-')[2], 10);
// input_variables
var dones = 110;
var maxdays = 24;
//result_variables
var perday;

function gettimeleft(done)
{
	if (Number.isInteger(done) === true)
	{
		if (done > needed)
			console.log("Congrats You already finished the required logtime");
		else
			timeleft = needed - done;
	}
	else
		return false;
}

function getdaysleft(maxday)
{
	if(date > maxday)
		console.log("The max date has already passed !");
	daysleft = maxday - date;
}

function printdaysleft()
{
	getdaysleft(maxdays);
	if (daysleft == null)
	{
		console.log("no value was set for daysleft\n");
		return;
	}
	if (daysleft == 1)
		console.log("You Have " + daysleft +" day to finish your logtime.\n");
	else if (daysleft >= 0)
		console.log("You Have " + daysleft +" days to finish your logtime.\n");
	else
		console.log("Error");
}

function printhoursleft()
{
	gettimeleft(dones);
	if (timeleft == null)
	{
		console.log("no value was set for timeleft");
		return;
	}
	if(timeleft == 1)
		console.log("You need " + timeleft + " hour to finish your logtime.\n");
	else if(timeleft > 1)
		console.log("You need " + timeleft + " hours to finish your logtime.\n");
	else
		console.log("Error");
}

function neddedperday()
{
	gettimeleft(dones);
	getdaysleft(maxdays);
	if (timeleft == null || daysleft == null || daysleft <= 0)
	{
		console.log("Error: Cannot calculate hours per day");
		return;
	}
	perday = timeleft / daysleft;
	if (perday > 24)
	{
		console.log("Sorry, but seems that you can't complete the required logtime of this month");
		return;
	}
	console.log("You need to log " + perday.toFixed(2) + " hour(s) in " + daysleft + " day(s)");
}

neddedperday();
