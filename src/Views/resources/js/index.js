import "../css/style.scss";

(async () => {
  let todos = await fetchTodos();
  renderTodo(todos);
  window.localStorage.setItem("todos", JSON.stringify(todos));
})();

document
  .getElementById("search")
  .addEventListener("keyup", event => {
    let todos = JSON.parse(window.localStorage.getItem("todos"));
    if (event.target.value) {
      clearTodo();
      renderTodo(
        todos.filter((todo) => todo.name.toLowerCase().includes(event.target.value.toLowerCase()))
      );
      return;
    }
    clearTodo();
    renderTodo(todos);
  });

async function fetchTodos() {
  try {
    const response = await fetch(`/todos`);
    const { data } = await response.json();
    return data;
  } catch (error) {}
}
function renderTodo(todos) {
  todos.map((todo, index) => {
    document.getElementById("todos").insertAdjacentHTML(
      "beforeend",
      `
      <div class="todo-item" >${index + 1}. ${todo.name}</div>
    `
    );
  });
}
function clearTodo() {
  document.getElementById("todos").innerHTML = "";
}
