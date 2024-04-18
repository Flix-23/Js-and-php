class ConvertTxt {
  constructor(text) {
    this.text = text;

  }
  Cantidad() {
    return this.text.length;
  }

  Mayuscula() {
    return this.text.toUpperCase();
  }
  Minuscula () {
    return this.text.toLowerCase();
  }
  Palindroma() {
    let word = Array.from(this.text);
    let reverseWord = word.reverse();
    let joinText = reverseWord.join("");
    let validat = joinText === this.text ? "es palindroma" : "no es palindroma";
    return validat;
  }
  
}

let convert = new ConvertTxt("neuquen");
console.log(convert.Palindroma());
