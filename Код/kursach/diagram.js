var ctx = document.getElementById('myChart').getContext('2d');

var m0 = document.getElementById('mark0').value;
var m1 = document.getElementById('mark1').value;
var m2 = document.getElementById('mark2').value;
var m3 = document.getElementById('mark3').value;
var m4 = document.getElementById('mark4').value;
var m5 = document.getElementById('mark5').value;

var chart = new Chart(ctx, {
	// The type of chart we want to create
	type: 'polarArea',

	// The data for our dataset
	data: {
		labels: ['0', '1', '2', '3', '4', '5'], // x
		datasets: [{
			//label: 'My First dataset', // легенда
			backgroundColor: ['red', 'OrangeRed', 'Salmon', 'DarkOrange', 'LimeGreen', 'Lime', 'green'],
			borderColor: 'white',
			data: [m0, m1, m2, m3, m4, m5]
		}]
	},

	// Configuration options go here
	options: {}
});
