$(function () {

    $(document).ready(function () {


        var $collector = $('#activity_etablissements');

        $collector.data('index', $collector.find(':input').length);
        addEtablissementForm($collector);
    });

    function addEtablissementForm($collector){

        var prototype = $collector.data('prototype');
        var index = $collector.data('index');
        var newForm = prototype.replace(/__name__/g,index);
        $collector.data('index', index+1);
        $('.etablissements').append(newForm);

    }
});