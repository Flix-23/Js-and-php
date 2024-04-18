let content = document.querySelector("#HomeWork");
let form = document.querySelector("#formDo");
let btn = document.querySelector(".btn");
let container = document.querySelector(".HomeWork");

let list = [];

if (localStorage.getItem("lista")) {
  list = JSON.parse(localStorage.getItem("lista"));
  iterar();
}
form.addEventListener("submit", (e) => {
  e.preventDefault();
  let text = content.value.trim();
  let verificar = list.some((e) => e === text);
  if (text === "" || verificar) {
    return;
  }

  list.push(text);
  console.log(list);
  localStorage.setItem("lista", JSON.stringify(list));
  iterar();
  nombre.value = "";
});

function iterar() {
  container.innerHTML = "";
  list.forEach((e, index) => {
    let li = document.createElement("div");
    li.classList.add("listaItem");
    let checkbox = document.createElement("input");
    checkbox.type = "checkbox";
    checkbox.classList.add("form-check-input", "p-2");
    checkbox.addEventListener("change", (event) => {
      if (event.target.checked) {
        li.style.textDecoration = "line-through ";
        li.classList.add("text-success");
      } else {
        li.style.textDecoration = "none";
        li.classList.remove("text-success");
      }
    });
    let btnTask = document.createElement("button");
    btnTask.classList.add("btn", "Delete");
    btnTask.textContent = "Eliminar";
    li.innerHTML = `<p class="fs-3">${e}</p>`;
    li.prepend(checkbox);
    li.appendChild(btnTask);
    container.appendChild(li);

    btnTask.addEventListener("click", (e) => {
      list = list.filter((item, i) => i !== index);
      localStorage.setItem("lista", JSON.stringify(list));
      console.log(list);
      iterar();
    });
  });
}

console.log(list);
