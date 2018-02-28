
var links = {setcolor:function (color){
    // var alist = document.querySelectorAll('a')
    // var i=0
    // while (i< alist.length){
    //   alist[i].style.color = color;
    //   i=i+1
    // }
    $('a').css('color', color);
  }
}

  var body = {setbackgroundcolor:function (color) {
     // document.querySelector('body').style.backgroundColor =color;
     $('body').css('backgroundColor', color);
    },
    setcolor:function (color){
    // document.querySelector('body').style.color =color;
    $('body').css('color', color);
   }
  }


  function nightdayhandler(self){
    var target = document.querySelector('body')
    if(this.value === 'night'){
      body.setbackgroundcolor('black')
      body.setcolor ('white');
      this.value = 'day';
      links.setcolor('powderblue')


    } else {
      body.setbackgroundcolor ('white');
      body.setcolor('black');
      this.value = 'night';
      links.setcolor('green')


    }
    }
