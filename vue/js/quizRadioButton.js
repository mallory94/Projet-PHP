$(function(){
    var loading = $('#loadbar').hide();
    $(document)
    .ajaxStart(function () {
        loading.show();
    }).ajaxStop(function () {
    	loading.hide();
    });
    
    $("label.btn").on('click',function () {
        var choice = $(this).find('input:radio').val();
        var parent = $(this).parent().parent();
        var loadbar = parent.find('#loadbar');
        var quizz = parent.find('#quiz');
        var answer = parent.find("#answer");
        var btnCourant = this;

        console.log(quizz.show);
        console.log(answer.show);
        console.log(parent.find( "#answer" ));   

        

    });

    $.fn.sayChoice = function(ck) {
        return("Vous avez sélectionné la réponse "+ ck);
    }; 
});	
