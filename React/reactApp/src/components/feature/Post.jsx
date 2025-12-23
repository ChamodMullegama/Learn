import React, { useEffect, useState } from "react";

const Post = () => {
  const [posts, setPosts] = useState([]);
  const [query, setQuery] = useState("");

  useEffect(() => {
    console.log("Post component mounted");

  fetch(`https://jsonplaceholder.typicode.com/posts?title_like=${query}`)

      .then((res) => {
        if (!res.ok) throw new Error("Network response was not ok");
        return res.json();
      })
      .then((data) => setPosts(data));
  }, [query]);


  const handleSearch = (e) => {
    setQuery(e.target.value);
  }

  return (
    <div>
        <input type="text" placeholder="search post"  onChange={handleSearch}/>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Body</th>
                </tr>
            </thead>
      {posts.length > 0 ? (
        <>
          {posts.map((post) => {
            return (
              <tbody key={post.id}>
                <tr>
                  <td>{post.id}</td>
                  <td>{post.title}</td>
                  <td>{post.body}</td>
                </tr>
              </tbody>
            );
          })}
        </>
      ) : (
        <p>no post</p>
      )}
      </table>
    </div>
  );
};

export default Post;
