// Cargar y mostrar los posts al cargar la página
document.addEventListener('DOMContentLoaded', async function() {
    const postList = document.getElementById('post-list');
    const posts = await getPosts();

    posts.forEach(post => {
        const li = document.createElement('li');
        li.innerHTML = `<h2>${post.title}</h2><p>${post.content}</p>`;
        postList.appendChild(li);
    });
});

// Manejar el formulario de creación de post
const createPostForm = document.getElementById('create-post-form');
createPostForm.addEventListener('submit', async function(event) {
    event.preventDefault();

    const title = document.getElementById('title').value;
    const content = document.getElementById('content').value;

    const newPost = await createPost({ title, content });
    alert(`Post creado: ${newPost.title}`);

    // Recargar la lista de posts
    document.location.reload();
});
