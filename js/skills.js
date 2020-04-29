$(document).ready(function(){
    //After document load, retrive all lines on history.json
    $.getJSON("history.json", function(data){
        data.forEach(function(item){
            getSpeed(item.versnelling, item.wiel, item.toeren)
        })
    }).done(function(){
        //after done loading and it succeeded run the next few lines
        $("<li />",{"class" : "page-item next", "html" : '<a class="page-link" onclick="NextPreviousCode(0)" href="#!">Volgende</a>'}).appendTo(".pagination")
        $(".page1").css("display", "block");
        ($('.page').length == 1 ? $('.next').addClass("disabled"):"");
    }).fail(function(){
        //if it failed (no data found) set the display of the nav to none
        $('.pageDiv').addClass('d-none')
    })
});

//Calculate speed
function getSpeed(versnelling, wiel, toeren){
    var versnellingVerhouding = verhouding(parseInt(versnelling));
    var WielInt = parseInt(wiel);
    var uitgaandeAs = toeren / versnellingVerhouding;
    var wielrondes = uitgaandeAs / 3.42;
    var wielCM = WielInt * 2.54;
    var wielOmtrek = wielCM * Math.PI;
    var afstandPM = wielrondes * wielOmtrek / 100;
    var afstandPU = afstandPM * 60 / 1000;
    createElement(versnelling,wiel,toeren,uitgaandeAs,wielrondes,wielOmtrek,afstandPU)
}


function createElement(versnelling,wiel,toeren,uitgaandeAs,wielrondes,wielOmtrek,afstandPU){

    //Creat a new page in the nav area, whenever there are 4 on the current page.
    if($(".historyData").length % 4 == 0 && $('.historyData').length > 0){
        var pageLength = $(".page").length + 1;
        $("<li />",{"class" : "page-item page", "html" : '<a class="page-link a' + pageLength + '" onclick="goPage(' + pageLength + ')" href="#">' + pageLength + '</a>'}).appendTo(".pagination")
    }
    var Pagecount = $(".page").length;

    // Create a new element
    $("<div />",{"html":"" +
            "Versnelling nummer: "+ versnelling +
            "<br>Wiel groote: " + wiel +
            "<br>Toeren: " + toeren + " tpm" +
            "<br>Uitgaande As : " + uitgaandeAs.toFixed(2) + " tpm" +
            "<br>De wielen draaien " + wielrondes.toFixed(2) + " keer rond p/m" +
            "<br>Omtrek van de wiel is: " + wielOmtrek.toFixed(2) + " CM" +
            "<br>Snelheid is: " + afstandPU.toFixed(2) + " km/u" +
            "<hr>", "class" : "historyData page" + Pagecount}).appendTo(".history")
}

//Return the versnellings verhouding
function verhouding(x){
    switch(x){
        case 0:
            return 0;
        case 1:
            return 2.97;
        case 2:
            return 2.07;
        case 3:
            return 1.43;
        case 4:
            return 1.00;
        case 5:
            return 0.84;
        case 6:
            return 0.56;
    }
}

//remove and add classes whenever a page button is clicked
function goPage(page){
    $('.historyData').css("display", "none")
    $('.page').removeClass("active")
    $('.page' + page).css("display", "block")
    $('.a' + page).parent(".page").addClass("active")
    NextPreviousDesign(page)
}

//check if the current page is the last or first page.
function NextPreviousDesign(page){
    if($('.page').length == page){
        $('.next').addClass("disabled")
    }else{
        $('.next').removeClass("disabled")
    }
    if(page == 1){
        $('.Previous').addClass("disabled")
    }else{
        $('.Previous').removeClass("disabled")
    }
}

//when next or previous is clicked run this below.
function NextPreviousCode(x){
    var activeNumber = parseInt($('.active > a').html());
    var passNumber = (x == 0 ? activeNumber + 1 : activeNumber - 1);
    goPage(passNumber)
}