$(document).ready(function() {
    $.getJSON('https://allorigins.me/get?url=' + encodeURIComponent('https://ru.aliexpress.com/item/Bluetooth-4-0-Glucose-Cholesterol-2in1-Meter-monitor-with-APP-for-IOS-Android-50-Glucose-Test/32846379081.html?spm=a2g0v.10010108.1000014.8.56484de2VCPiYK&traffic_analysisId=recommend_3035_null_null_null&scm=1007.13338.98539.000000000000000&pvid=8c28e8fe-f991-40ed-a0d6-c358295de075&tpp=1&aff_platform=link-c-tool&cpt=1528899597734&sk=Iurr7eM&aff_trace_key=164c1f28f07040879a541fcc5baa3054-1528899597734-01139-Iurr7eM&terminal_id=65a39b2dafdb412c918dc4e6ee92e23f') + '&callback=?', function(data){
        let cholesterol_tester_price;
        if(data.contents.match(/itemprop="price">(.*?)<\/span>/)) {
            cholesterol_tester_price = data.contents.match(/itemprop="price">(.*?)<\/span>/)[1];
        } else {
            cholesterol_tester_price = data.contents.match(/itemprop="highPrice">(.*?)<\/span>/)[1];
        }

        $("#cholesterol-tester").html(cholesterol_tester_price + " руб.");
    });

    $.getJSON('http://allorigins.me/get?url=' + encodeURIComponent('https://ru.aliexpress.com/item/HEAL-FORCE-180B-Portable-Heart-Ecg-Monitor-Software-Electrocardiogram-Electro-electrocardioscanner-CE-approve/1659571999.html?spm=a2g0s.8937460.0.0.OROc1N&aff_platform=link-c-tool&cpt=1528904170934&sk=MN7AMbQ&aff_trace_key=c80c770a96124a4fb6961b0fa0114b83-1528904170934-06927-MN7AMbQ&terminal_id=65a39b2dafdb412c918dc4e6ee92e23f') + '&callback=?', function(data){
        let EKG_monitor_price;
        if(data.contents.match(/itemprop="price">(.*?)<\/span>/)) {
            EKG_monitor_price = data.contents.match(/itemprop="price">(.*?)<\/span>/)[1];
        } else {
            EKG_monitor_price = data.contents.match(/itemprop="highPrice">(.*?)<\/span>/)[1];
        }

        $("#EKG-monitor").html(EKG_monitor_price + " руб.");
    });

    $.getJSON('http://allorigins.me/get?url=' + encodeURIComponent('https://ru.aliexpress.com/item/Health-Care-New-Arrival-Arm-Style-Full-Automatic-Electronic-Blood-Pressure-Monitor-Sphygmomanometer-Blood-Pressure-Monitor/32672759857.html?spm=a2g0v.10010108.1000014.6.2f3870a29ZxvWA&traffic_analysisId=recommend_3035_null_null_null&scm=1007.13338.98539.000000000000000&pvid=cccfee07-9e58-48a4-8cf5-720be21bac8f&tpp=1&aff_platform=link-c-tool&cpt=1528904728849&sk=rBYRzFq&aff_trace_key=aac64835f1d848d6900025e6aa36e45c-1528904728849-08166-rBYRzFq&terminal_id=65a39b2dafdb412c918dc4e6ee92e23f') + '&callback=?', function(data){
        let tonometer_price;
        if(data.contents.match(/itemprop="price">(.*?)<\/span>/)) {
            tonometer_price = data.contents.match(/itemprop="price">(.*?)<\/span>/)[1];
        } else {
            tonometer_price = data.contents.match(/itemprop="highPrice">(.*?)<\/span>/)[1];
        }

        $("#tonometer").html(tonometer_price + " руб.");
    });
})