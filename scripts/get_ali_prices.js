$(document).ready(function() {
    function get_price(el_id, link) {
        $.getJSON('https://allorigins.me/get?url=' + encodeURIComponent(link) + '&callback=?', function(data){
        let price;
        if(data.contents.match(/itemprop="price">(.*?)<\/span>/)) {
            price = data.contents.match(/itemprop="price">(.*?)<\/span>/)[1];
        } else {
            price = data.contents.match(/itemprop="highPrice">(.*?)<\/span>/)[1];
        }

        $("#" + el_id).html(price + " руб.");
        });
    }

    get_price("cholesterol-tester", "https://ru.aliexpress.com/item/Bluetooth-4-0-Glucose-Cholesterol-2in1-Meter-monitor-with-APP-for-IOS-Android-50-Glucose-Test/32846379081.html?spm=a2g0v.10010108.1000014.8.56484de2VCPiYK&traffic_analysisId=recommend_3035_null_null_null&scm=1007.13338.98539.000000000000000&pvid=8c28e8fe-f991-40ed-a0d6-c358295de075&tpp=1&aff_platform=link-c-tool&cpt=1529309285558&sk=Iurr7eM&aff_trace_key=7489279a51da473882fcd63521373654-1529309285558-01618-Iurr7eM&terminal_id=65a39b2dafdb412c918dc4e6ee92e23f");
    get_price("EKG-monitor", "https://ru.aliexpress.com/item/HEAL-FORCE-180B-Portable-Heart-Ecg-Monitor-Software-Electrocardiogram-Electro-electrocardioscanner-CE-approve/1659571999.html?spm=a2g0s.8937460.0.0.OROc1N&aff_platform=link-c-tool&cpt=1529309660837&sk=MN7AMbQ&aff_trace_key=7af13e390e4646cb9ac4b31a19fda91e-1529309660837-02988-MN7AMbQ&terminal_id=65a39b2dafdb412c918dc4e6ee92e23f");
    get_price("tonometer", "https://ru.aliexpress.com/item/Health-Care-New-Arrival-Arm-Style-Full-Automatic-Electronic-Blood-Pressure-Monitor-Sphygmomanometer-Blood-Pressure-Monitor/32672759857.html?spm=a2g0v.10010108.1000014.6.2f3870a29ZxvWA&traffic_analysisId=recommend_3035_null_null_null&scm=1007.13338.98539.000000000000000&pvid=cccfee07-9e58-48a4-8cf5-720be21bac8f&tpp=1&aff_platform=link-c-tool&cpt=1529309672071&sk=rBYRzFq&aff_trace_key=946aa4144ea5443eb091d6f1e5efc062-1529309672071-06621-rBYRzFq&terminal_id=65a39b2dafdb412c918dc4e6ee92e23f");
    get_price("scales", "https://ru.aliexpress.com/item/-/32848028633.html?spm=a2g0s.8937460.0.0.5bc22e0eyc7bMS&aff_platform=link-c-tool&cpt=1529309684737&sk=ChYYJvq&aff_trace_key=7e13ac55b8034631b7765ebe5ba56a8c-1529309684737-06443-ChYYJvq&terminal_id=65a39b2dafdb412c918dc4e6ee92e23f");
    get_price("smart-watch", "https://ru.aliexpress.com/item/GASON-B1-Smart-Wristband-Cicret-band-Watch-Heart-rate-monitor-Smartband-Pulsometer-Sport-health-Fitness-Bracelet/32869392393.html?spm=a2g0v.search0604.3.9.7da02623VTT4f1&s=p&ws_ab_test=searchweb0_0%252Csearchweb201602_3_10152_10151_10065_10344_5723115_10068_5722815_10342_10343_10340_5722915_10341_10543_5711416_5722615_10696_10084_10083_10618_10307_10301_5722715_10059_100031_10103_5711515_10624_10623_10622_5722515_10621_10620_10125%252Csearchweb201603_32%252CppcSwitch_5&algo_expid=20709094-d0c6-4213-bfe2-dce4453e72d6-4&algo_pvid=20709094-d0c6-4213-bfe2-dce4453e72d6&priceBeautifyAB=0&aff_platform=link-c-tool&cpt=1529309713550&sk=bXipeSos&aff_trace_key=d59c143a635a42059db693435826db7f-1529309713550-07192-bXipeSos&terminal_id=65a39b2dafdb412c918dc4e6ee92e23f");
    get_price("heart-rate-monitor", "https://ru.aliexpress.com/item/Health-Care-Finger-Pulse-Oximete-LED-Blood-Pressure-Fingertip-Pulse-Oximeter-Oxymeter-Monitor-Drop-Shipping-Hot/32680702380.html?spm=a2g0v.search0604.3.146.6c343e10JkC6aL&ws_ab_test=searchweb0_0%252Csearchweb201602_3_10152_10151_10065_10344_5723115_10068_5722815_10342_10343_10340_5722915_10341_10543_5711416_5722615_10696_10084_10083_10618_10307_10301_5722715_10059_100031_10103_5711515_10624_10623_10622_5722515_10621_10620_10125%252Csearchweb201603_32%252CppcSwitch_5&algo_expid=0960a1f5-d829-4295-bcdc-e784e44b6318-21&algo_pvid=0960a1f5-d829-4295-bcdc-e784e44b6318&priceBeautifyAB=0&aff_platform=link-c-tool&cpt=1529309728223&sk=bqomT23I&aff_trace_key=3fedc0c93ca34f0a9038d51d74c3a877-1529309728223-07176-bqomT23I&terminal_id=65a39b2dafdb412c918dc4e6ee92e23f");
 
})
