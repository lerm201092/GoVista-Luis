google.charts.load('current', {'packages':['line']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

var data = new google.visualization.DataTable();
data.addColumn('string', 'Day');
data.addColumn('number', 'Guardians of the Galaxy');

data.addRows([
  ['', 0],
  ['Citas activas',  1],
  ['Total de pacientes',  1],
  ['Pacientes Activos',  2],
  ['Pacientes',  4]
]);

var options = {
  chart: {
    title: 'Box Office Earnings in First Two Weeks of Opening',
    subtitle: 'in millions of dollars (USD)'
  },
   bold: true,
  width: 900,
  height: 500,
  axes: {
    x: {
      0: {side: 'bottom'}
    }
  }
};

var chart = new google.charts.Line(document.getElementById('line_top_x'));

chart.draw(data, google.charts.Line.convertOptions(options));
}