var mpAnswers = ["B", "C", "A"],
  mpNum = mpAnswers.length;
var saAnswers = ["ibi"],
  saNum = saAnswers.length;

function getChosenVal(Name) {
  var radios = document.getElementsByName(Name);
  for (var y = 0; y < radios.length; y++)
    if (radios[y].checked)
      return radios[y].value;
}

function getScore() {
  var score = 0;
  var sa = document.getElementsByClassName('shortanswer');
  for (var i = 0; i < mpNum; i++)
    if (getChosenVal("question" + i) === mpAnswers[i])
      score++;
  for (var j = 0; j < saNum; j++) {
    if (sa[j].value.toUpperCase() === saAnswers[j].toUpperCase())
      score++;
  }
  return score;
}

function returnTotalScore() {
  document.getElementById("myresults").innerHTML = "Your score is " + getScore() + "/" + (saNum + mpNum);
}

function makeMC(question, num, rightAnswer) {
  document.writeln("< li ><h4>" + num + ") " + question + "</h4><ul class='choices'><li><label><input type='radio' name='question" + (num-1) + "' value='A'><span>1</span></label></li><li><label><input type='radio' name='question" + (num-1) + "'value='B'><span>2</span></label></li><li><label><input type='radio' name='question" + (num-1) + "' value='C'><span>3</span></label></li><li><label><input type='radio' name='question" + (num-1) + "' value='D'><span>4</span></label></li></ul></li><li>");
}

// makeMC("how much do u suck?",5, "B");

