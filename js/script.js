function checkFileInfo(){

    var ret = true;
    $('#error-message').html("");
    $('input').css('border-color','');
    if($('#file').val() == ""){
        $('#error-message').append('ファイルを選択してください<br>');
        $('#file').css('border-color','red');
        ret = false;
    }
    else if($('#file').prop('files')[0].type != 'application/zip'){
        $('#error-message').append('zipファイルのみアップロード可能です<br>');
        $('#file').css('border-color','red');
        ret = false;
    }

    if($('#title').val() == ""){
        $('#error-message').append('タイトルを入力してください<br>');
        $('#title').css('border-color','red');
        ret = false;
    }
    if($('#author').val() == ""){
        $('#error-message').append('作者名を入力してください<br>');
        $('#author').css('border-color','red');
        ret = false;
    }
    return ret;
}

function checkEventInfo(){
    var ret = true;
    $('#error-message').html("");
    $('input').css('border-color','');
    if($('#eventname').val() == ""){
        $('#error-message').append('イベント名を入力してください<br>');
        $('#eventname').css('border-color','red');
        ret = false;
    }
    if($('#deadlinedate').val() == ""){
        $('#error-message').append('締切日を入力してください<br>');
        $('#deadlinedate').css('border-color','red');
        ret = false;
    }
    else if($('#deadlinetime').val() == ""){
        $('#error-message').append('締切日を入力してください<br>');
        $('#deadlinetime').css('border-color','red');
        ret = false;
    }
    return ret;
}

function countDown(date,elementId){
    var startDateTime = new Date();
    var endDateTime = new Date(2017,8,1,20,00);
    var left = endDateTime - startDateTime;
    var a_day = 24 * 60 * 60 * 1000;

    console.log(startDateTime);
    console.log(endDateTime);
    console.log(left);

    var d = Math.floor(left / a_day);

    var h = Math.floor((left % a_day) / (60 * 60 * 1000));

    var m = Math.floor((left % a_day) / (60 * 1000)) % 60;

    var s = Math.floor((left % a_day) / 1000) % 60 % 60;

    var ms = Math.floor((left % a_day) % 1000);

    console.log(elementId);
    $("#"+elementId).text(d + '日と' +  h + ':' + m + ':' + s + ':' + ms);
    setTimeout('countDown(0,' + elementId + ')',1);
}

var CountDown = function(elementId){
    this.elmId = elementId;
    this.startDateTime = new Date();
    this.endDateTime = new Date(2017,8,1,20,00);
    this.leftTime = this.endDateTime - this.startDateTime;

    console.log(this.startDateTime);
    console.log(this.endDateTime);
    console.log(this.leftTime);

    this.start = function(){
        //setTimeout(this.count(),10);
    }

    this.count = function(){
        this.startDateTime = new Date();
        this.leftTime = this.endDateTime - this.startDateTime;
        var left = this.leftTime;
        var a_day = 24 * 60 * 60 * 1000;

        var d = Math.floor(left / a_day);
        var h = Math.floor((left % a_day) / (60 * 60 * 1000));
        var m = Math.floor((left % a_day) / (60 * 1000)) % 60;
        var s = Math.floor((left % a_day) / 1000) % 60 % 60;
        var ms = Math.floor((left % a_day) % 1000);

        console.log(d + '日と' +  h + ':' + m + ':' + s + ':' + ms);

        setTimeout(this.count(),10000);
    }
}