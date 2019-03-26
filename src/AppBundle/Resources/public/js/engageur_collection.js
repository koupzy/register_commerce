$(function () {

    $(document).ready(function () {


        var $collector = $('#activity_engageurs');

        $collector.data('index', $collector.find(':input').length);
        addEngageurForm($collector);
    });

    function addEngageurForm($collector){

        var prototype = $collector.data('prototype');
        var index = $collector.data('index');
        var newForm = prototype.replace(/__name__/g,index);
        $collector.data('index', index+1);
        $('.engageurs').append(newForm);
    }
});