const body = document.querySelector("body");
    const navbar = document.querySelector(".navbar");
    const menuBtn = document.querySelector(".menu-btn");
    const cancelBtn = document.querySelector(".cancel-btn");
    menuBtn.onclick = ()=>{
      navbar.classList.add("show");
      menuBtn.classList.add("hide");
      body.classList.add("disabled");
    }
    cancelBtn.onclick = ()=>{
      body.classList.remove("disabled");
      navbar.classList.remove("show");
      menuBtn.classList.remove("hide");
    }


const q1 = document.querySelector("#question1");
const a1 = document.querySelector("#answer1");

const q2 = document.querySelector("#question2");
const a2 = document.querySelector("#answer2");

const q3 = document.querySelector("#question3");
const a3 = document.querySelector("#answer3");

const q4 = document.querySelector("#question4");
const a4 = document.querySelector("#answer4");

const q5 = document.querySelector("#question5");
const a5 = document.querySelector("#answer5");

const q6 = document.querySelector("#question6");
const a6 = document.querySelector("#answer6");

const q7 = document.querySelector("#question7");
const a7 = document.querySelector("#answer7");

const q8 = document.querySelector("#question8");
const a8 = document.querySelector("#answer8");

const q9 = document.querySelector("#question9");
const a9 = document.querySelector("#answer9");

const q10 = document.querySelector("#question10");
const a10 = document.querySelector("#answer10");

const q11 = document.querySelector("#question11");
const a11 = document.querySelector("#answer11");

const q12 = document.querySelector("#question12");
const a12 = document.querySelector("#answer12");

const q13 = document.querySelector("#question13");
const a13 = document.querySelector("#answer13");

const q14 = document.querySelector("#question14");
const a14 = document.querySelector("#answer14");

const q15 = document.querySelector("#question15");
const a15 = document.querySelector("#answer15");


q1.onclick = ()=>{
  a1.classList.toggle("answer-show");
  q1.classList.toggle("question-show");
}

q2.onclick = ()=>{
  a2.classList.toggle("answer-show");
  q2.classList.toggle("question-show");
}

q3.onclick = ()=>{
  a3.classList.toggle("answer-show");
  q3.classList.toggle("question-show");
}

q4.onclick = ()=>{
  a4.classList.toggle("answer-show");
  q4.classList.toggle("question-show");
}

q5.onclick = ()=>{
  a5.classList.toggle("answer-show");
  q5.classList.toggle("question-show");
}

q6.onclick = ()=>{
  a6.classList.toggle("answer-show");
  q6.classList.toggle("question-show");
}

q7.onclick = ()=>{
  a7.classList.toggle("answer-show");
  q7.classList.toggle("question-show");
}

q8.onclick = ()=>{
  a8.classList.toggle("answer-show");
  q8.classList.toggle("question-show");
}

q9.onclick = ()=>{
  a9.classList.toggle("answer-show");
  q9.classList.toggle("question-show");
}

q10.onclick = ()=>{
  a10.classList.toggle("answer-show");
  q10.classList.toggle("question-show");
}

q11.onclick = ()=>{
  a11.classList.toggle("answer-show");
  q11.classList.toggle("question-show");
}

q12.onclick = ()=>{
  a12.classList.toggle("answer-show");
  q12.classList.toggle("question-show");
}

q13.onclick = ()=>{
  a13.classList.toggle("answer-show");
  q13.classList.toggle("question-show");
}

q14.onclick = ()=>{
  a14.classList.toggle("answer-show");
  q14.classList.toggle("question-show");
}

q15.onclick = ()=>{
  a15.classList.toggle("answer-show");
  q15.classList.toggle("question-show");
}