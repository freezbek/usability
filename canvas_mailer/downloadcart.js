
var chart = new CanvasJS.Chart("chartContainer",
    {
        title: {
            text: "Exporting chart using toDataurl"
        },
        data: [
            {
                type: "spline",
                dataPoints: [
                    { x: 10, y: 4 },
                    { x: 20, y: 7 },
                    { x: 30, y: 2 },
                    { x: 40, y: 3 },
                    { x: 50, y: 5 }
                ]
            }
        ]
    });

chart.render();

$("#btn-download").click(function () {

    var canvas = $(".canvasjs-chart-canvas").get(0);
    var dataURL = canvas.toDataURL('image/jpeg');
    console.log(dataURL);

    $("#btn-download").attr("href", dataURL);

});
