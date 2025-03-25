document.addEventListener("DOMContentLoaded", async () => {
    let url = new URLSearchParams(window.location.search)
    let id = url.get("id")

    await renderPostPage(id)
})

const renderPost = ({ post, comments }) => `
    <h1>${post.title}</h1>
    <p>${post.body}</p>
    <section class="comments">${comments}</section>
`

const renderComment = comment => `
    <article class="comment__body">
        <h3>${comment.name}</h3>
        <h5>${comment.email}</h5>
        <p>${comment.body}</p>
    </article>
`

const renderPostPage = async (id) => {
    let selector = document.querySelector("[data-post]")
    let post = await getPost(id)
    let comments = await getComments(id)
    let renderedComments = renderComments(comments)

    selector.innerHTML = renderPost({ post: post, comments: renderedComments })
}

const getPost = async (id) => {
    try {
        let res = await fetch(`https://jsonplaceholder.typicode.com/posts/${id}`)

        if (!res.ok) {
            throw new Error(`Request failed with status ${res.status}`)
        }

        let post = await res.json()
        return { title: post.title, body: post.body };
    } catch (error) {
        console.error("Error fetching posts:", error)
        return { title: "", body: "" };
    }
}

const getComments = async (id) => {
    try {
        let res = await fetch(`https://jsonplaceholder.typicode.com/posts/${id}/comments`)

        if (!res.ok) {
            throw new Error(`Request failed with status ${res.status}`)
        }

        let comments = await res.json()
        return comments
    } catch (error) {
        console.error("Error fetching comments:", error)
        return []
    }
}

const renderComments = (comments) => {
    if (comments != null)
    {
        let renderedComments = comments.map(comment => renderComment(comment)).join("")
        return renderedComments
    } else {
        return ""
    }
}