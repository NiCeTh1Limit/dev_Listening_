function preview_print_pie_test1(){
    var labels= ['無相關','聲學型','語意型'];
    var data = {
        labels:labels,
        datasets: [{
            //預設資料
            data:[
                document.getElementById('print_meaning_score').innerText,
                document.getElementById('print_sound_score').innerText,
                document.getElementById('print_none_score').innerText
            ],
            backgroundColor: [
            //資料顏色
                        "rgba(0,0,255,0.66)",
                        "rgba(255,0,0,0.66)",
                        "rgba(0,255,0,0.66)"
            ],
        }]
        };
    var options = {
            //showAllTooltips: true,
            legend: {
                display: false
            },
            responsive: true,
            tooltips: {
                enabled: false
            },
            animation: false,
            plugins: {
                labels: [
                    {
                        render: 'percentage',
                        position: 'outside',
                        fontSize: 14,
                        fontColor: '#000',
                        outsidePadding: 30,
                        textMargin: 9
                    },
                    {
                        render: 'label',
                        position: 'border',
                        fontColor: '#000',
                        fontSize: 16,
                        textShadow: true,
                        shadowBlur: 2,
                        shadowOffsetX: 0,
                        shadowOffsetY: 0,
                        shadowColor: 'rgba(0,0,0,1)'
                    }
                ]
            }
        }
    ///*
    var ctx = document.getElementById('pie_1').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
    
        data : data,
        options: options
    });
    //*/
}
function preview_print_pie_test2(){
    var labels= ['地點','人物','情境', '聯想'];
    var data = {
        labels:labels,
        datasets: [{
            //預設資料
            data:[
                document.getElementById('print_where_score').innerText,
                document.getElementById('print_who_score').innerText,
                document.getElementById('print_what_score').innerText,
                document.getElementById('print_associate_score').innerText
            ],
            backgroundColor: [
            //資料顏色
                        "rgba(0,0,255,0.66)",
                        "rgba(255,0,0,0.66)",
                        "rgba(0,255,0,0.66)",
                        "rgba(128,0,128,0.66)"
            ],
        }]
        };
    var options = {
            //showAllTooltips: true,
            legend: {
                display: false
            },
            responsive: true,
            tooltips: {
                enabled: false
            },
            animation: false,
            plugins: {
                labels: [
                    {
                        render: 'percentage',
                        position: 'outside',
                        fontSize: 14,
                        fontColor: '#000',
                        outsidePadding: 30,
                        textMargin: 9
                    },
                    {
                        render: 'label',
                        position: 'border',
                        fontColor: '#000',
                        fontSize: 16,
                        textShadow: true,
                        shadowBlur: 2,
                        shadowOffsetX: 0,
                        shadowOffsetY: 0,
                        shadowColor: 'rgba(0,0,0,1)'
                    }
                ]
            }
        }
    ///*
    var ctx = document.getElementById('pie_2').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
    
        data : data,
        options: options
    });
    //*/
}
function preview_print_pie_AACPR(){
    var labels= ['測驗一','測驗二'];
    var data = {
        labels:labels,
        datasets: [{
            //預設資料
            data:[
                document.getElementById('print_test1_failed_score').innerText,
                document.getElementById('print_test2_failed_score').innerText
            ],
            backgroundColor: [
            //資料顏色
                        "rgba(0,0,255,0.66)",
                        "rgba(255,0,0,0.66)"
            ],
        }]
        };
    var options = {
            //showAllTooltips: true,
            legend: {
                display: false
            },
            responsive: true,
            tooltips: {
                enabled: false
            },
            animation: false,
            plugins: {
                labels: [
                    {
                        render: 'percentage',
                        position: 'outside',
                        fontSize: 14,
                        fontColor: '#000',
                        outsidePadding: 30,
                        textMargin: 9
                    },
                    {
                        render: 'label',
                        position: 'border',
                        fontColor: '#000',
                        fontSize: 16,
                        textShadow: true,
                        shadowBlur: 2,
                        shadowOffsetX: 0,
                        shadowOffsetY: 0,
                        shadowColor: 'rgba(0,0,0,1)'
                    }
                ]
            }
        }
    ///*
    var ctx = document.getElementById('pie_3').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
    
        data : data,
        options: options
    });
    //*/
}