"use strict";

//datasetsの値を配列で作成
let datasets = [];
chart_task_id_arr.forEach((chart_task_id) => {
    datasets.push({
        label: `${chart_datasets_label_arr[chart_task_id - 1]}`,
        data: chart_datasets_data_arr[chart_task_id - 1],
        borderColor: `rgba(${((chart_task_id - 1) % 255) * 40}, ${
            ((chart_task_id + 3) % 255) * 40
        }, ${((chart_task_id + 7) % 255) * 40}, 1)`,
        backgroundColor: "rgba(0, 0, 0, 0)",
        lineTension: 0,
    });
});

//グラフを描画
var ctx = document.getElementById("time_log_chart");
var time_log_chart = new Chart(ctx, {
    type: "line",
    data: {
        labels: chart_labels,
        datasets: datasets,
    },
    options: {
        title: {
            display: true,
            text: "時間記録",
        },
    },

    // Configuration options go here
    options: {
        scales: {
            xAxes: [
                {
                    type: "time",
                    time: {
                        unit: "day",
                    },
                },
            ],
        },
    },
});
