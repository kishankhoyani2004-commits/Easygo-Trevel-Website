<?php
session_start();

/* ================= LOGIN/SIGNUP ================= */
if(isset($_POST['login'])){
    $_SESSION['user'] = trim($_POST['username']);
    $_SESSION['avatar'] = "https://i.pravatar.cc/40?u=".$_SESSION['user'];
    header("Location: community.php");
    exit;
}

if(isset($_POST['signup'])){
    $_SESSION['user'] = trim($_POST['username']);
    $_SESSION['avatar'] = "https://i.pravatar.cc/40?u=".$_SESSION['user'];
    header("Location: community.php");
    exit;
}

if(isset($_GET['logout'])){
    session_destroy();
    header("Location: community.php");
    exit;
}

/* ================= INITIAL POSTS ================= */
if(!isset($_SESSION['posts'])){
    $_SESSION['posts'] = [
        [
            "user"=>"Hasti Lathiya",
            "title"=>"Goa Beach Vibes 🌊",
            "story"=>"Best sunset ever with friends ❤️ #Goa #BeachLife",
            "image"=>"https://images.unsplash.com/photo-1507525428034-b723cf961d3e",
            "rating"=>5,
            "likes"=>21,
            "reviews"=>[
                "Amazing destination 😍",
                "Goa is love!",
                "Next trip together!",
                "So aesthetic 🔥"
            ],
            "time"=>time(),
        ],
        [
            "user"=>"Travel Lover",
            "title"=>"Manali Snow Trip ❄",
            "story"=>"Mountains + Snow = Peace. #Manali #Mountains",
            "image"=>"https://images.unsplash.com/photo-1501785888041-af3ef285b470",
            "rating"=>4,
            "likes"=>12,
            "reviews"=>[
                "Snow paradise 🤍",
                "Looks dreamy!",
                "Honeymoon vibes 💕",
                "Beautiful capture 📸"
            ],
            "time"=>time(),
        ]
    ];
}

/* ================= ADD POST ================= */
if(isset($_POST['add_post']) && isset($_SESSION['user'])){
    $_SESSION['posts'][] = [
        "user"=>$_SESSION['user'],
        "title"=>htmlspecialchars($_POST['title']),
        "story"=>htmlspecialchars($_POST['story']),
        "image"=>htmlspecialchars($_POST['image']),
        "rating"=>(int)$_POST['rating'],
        "likes"=>0,
        "reviews"=>[],
        "time"=>time()
    ];
    header("Location: community.php");
    exit;
}

/* ================= LIKE ================= */
if(isset($_GET['like']) && isset($_SESSION['user'])){
    $idx = $_GET['like'];
    if(!isset($_SESSION['liked'][$idx])){
        $_SESSION['posts'][$idx]['likes']++;
        $_SESSION['liked'][$idx]=true;
    }
    header("Location: community.php");
    exit;
}

/* ================= DELETE ================= */
if(isset($_GET['delete']) && isset($_SESSION['user'])){
    unset($_SESSION['posts'][$_GET['delete']]);
    $_SESSION['posts'] = array_values($_SESSION['posts']); // reindex
    header("Location: community.php");
    exit;
}

/* ================= ADD COMMENT ================= */
if(isset($_POST['add_comment'])){
    $idx = $_POST['post_index'];
    $_SESSION['posts'][$idx]['reviews'][] = htmlspecialchars($_POST['comment']);
    header("Location: community.php");
    exit;
}

/* ================= EDIT POST ================= */
if(isset($_POST['edit_post'])){
    $idx = $_POST['post_index'];
    $_SESSION['posts'][$idx]['title'] = htmlspecialchars($_POST['title']);
    $_SESSION['posts'][$idx]['story'] = htmlspecialchars($_POST['story']);
    $_SESSION['posts'][$idx]['image'] = htmlspecialchars($_POST['image']);
    $_SESSION['posts'][$idx]['rating'] = (int)$_POST['rating'];
    header("Location: community.php");
    exit;
}

/* ================= SEARCH & SORT ================= */
$search = $_GET['search'] ?? '';
$sort = $_GET['sort'] ?? '';
$posts = $_SESSION['posts'];

/* Apply search filter */
if($search){
    $posts = array_filter($posts, function($p) use($search){
        return stripos($p['title'],$search)!==false || stripos($p['user'],$search)!==false;
    });
}

/* Apply sorting */
if($sort=='likes'){
    usort($posts,function($a,$b){return $b['likes']-$a['likes'];});
}elseif($sort=='rating'){
    usort($posts,function($a,$b){return $b['rating']-$a['rating'];});
}elseif($sort=='latest'){
    usort($posts,function($a,$b){return $b['time']-$a['time'];});
}

/* Trending Posts for Sidebar */
$trending = $_SESSION['posts'];
usort($trending, function($a,$b){return $b['likes']-$a['likes'];});
$trending = array_slice($trending,0,3);

/* Top Users */
$users = [];
foreach($_SESSION['posts'] as $p){
    if(!isset($users[$p['user']])) $users[$p['user']] = 0;
    $users[$p['user']] += $p['likes'];
}
arsort($users);
$topUsers = array_slice($users,0,3,true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Premium Travel Community</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body{
    margin:0;
    font-family:'Arial', sans-serif;
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
    url("images/bg.jpg") center/cover fixed;
    color:white;
}

/* HEADER */
.header{
    text-align:center;
    font-size:36px;
    font-weight:bold;
    padding:40px 0;
    text-shadow: 0 0 10px rgba(0,0,0,0.7);
}
.user-content{
    text-align:center;
}
/* USER BAR */
.user-bar{
    text-align:center;
    margin-top:15px;
    padding:8px 18px;
    justify-content:center;
    display:inline-block;
    border-radius:20px;
    background:rgba(255,255,255,0.1);
    backdrop-filter:blur(10px);
}
.user-bar img{border-radius:50%;vertical-align:middle;margin-right:5px;}

/* LAYOUT */
.container{
    width:90%;
    max-width:1200px;
    margin:auto;
    display:flex;
    gap:20px;
}
.main{
    flex:3;
}
.sidebar{
    flex:1;
}

/* SEARCH & SORT */
.top-bar{
    text-align:center;
    margin-bottom:30px;
}
.top-bar input[type=text]{
    padding:10px 15px;
    border-radius:30px;
    border:none;
    width:60%;
    margin-right:10px;
}
.top-bar button{
    padding:10px 20px;
    border-radius:30px;
    border:none;
    background:#ff5722;
    color:white;
    cursor:pointer;
}
.top-bar select{
    padding:10px 15px;
    border-radius:30px;
    border:none;
    margin-left:10px;
}

/* POST CARD */
.post{
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(20px);
    padding:25px;
    border-radius:25px;
    margin-bottom:30px;
    box-shadow: 0 10px 35px rgba(0,0,0,0.5);
    transition: transform 0.3s, box-shadow 0.3s;
}
.post:hover{
    transform: translateY(-5px);
    box-shadow: 0 15px 50px rgba(0,0,0,0.6);
}
.post img{
    width:100%;
    border-radius:20px;
    margin-top:15px;
}
.stars{font-size:20px;color:gold;}
.review{
    background:rgba(255,255,255,0.2);
    padding:8px 12px;
    border-radius:12px;
    margin:5px 0;
    font-size:14px;
}
.time{font-size:12px;color:#ccc;}

/* BUTTONS */
a.like, .edit-btn, .delete-btn{
    color:#ff4d6d;
    font-weight:bold;
    margin-right:15px;
}
a.like:hover, .edit-btn:hover, .delete-btn:hover{opacity:0.8;}
input[type=text]{padding:8px 12px;border-radius:20px;border:none;width:70%;margin-right:5px;}
button{padding:8px 15px;border:none;border-radius:20px;background:#ff5722;color:white;cursor:pointer;}

/* ADD BUTTON */
.add-btn{
    position:fixed;
    bottom:30px;
    right:30px;
    width:65px;
    height:65px;
    background:#ff5722;
    color:white;
    font-size:32px;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    cursor:pointer;
    box-shadow:0 10px 30px rgba(0,0,0,0.6);
}

/* POPUPS */
.popup, #loginPopup, #editPopup{
    display:none;
    position:fixed;
    top:0; left:0;
    width:100%; height:100%;
    background: rgba(0,0,0,0.7);
    justify-content:center; align-items:center;
}
.popup-box{
    background:white;
    color:black;
    border-radius:20px;
    width:90%;
    max-width:450px;
    padding:30px;
    position:relative;
}
.popup-box input, .popup-box textarea, .popup-box select{
    width:100%; padding:10px; margin:10px 0; border-radius:15px; border:1px solid #ccc;
}
.popup-box button{
    width:100%; padding:12px; border:none; border-radius:20px; background:#ff5722; color:white; cursor:pointer; font-size:16px;
}
.close{
    position:absolute; top:15px; right:20px; font-size:22px; cursor:pointer;
}
.star-rating{font-size:28px; cursor:pointer; color:#ccc; text-align:center;}
.star-rating span.active{color:gold;}

/* SIDEBAR */
.sidebar h3{text-align:center;margin-bottom:15px;}
.sidebar .card{
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(20px);
    padding:15px;
    border-radius:20px;
    margin-bottom:20px;
    text-align:center;
    box-shadow:0 8px 30px rgba(0,0,0,0.4);
}
.sidebar .card img{border-radius:50%;margin-bottom:10px;}

.user-bar{
    width:100%;
    text-align:center;
    margin-top:15px;
    font-size:16px;
    font-weight:600;
}

/* Welcome text */
.welcome{
    color:#00e5ff;
    font-weight:700;
}

/* Email */
.email{
    color:#ffcc00;
    font-weight:700;
}

/* Logout */
.logout{
    color:#ff4d4d;
    text-decoration:none;
    margin-left:6px;
    font-weight:700;
    transition:0.3s;
}

.logout:hover{
    color:#ffffff;
    text-decoration:underline;
}
</style>
</head>
<body>

<div class="header">🌍 Premium Travel Community</div>

<div class="user-bar">
<?php if(isset($_SESSION['user'])): ?>
    <span class="welcome">Welcome,</span> 
    <span class="email"><?= $_SESSION['user']['email'] ?></span> |
    <a href="logout.php" class="logout">Logout</a>
<?php else: ?>
    Not Logged In
<?php endif; ?>
</div>

<div class="container">
<div class="main">

<?php foreach($posts as $index => $post): ?>
<div class="post">
<small><?= $post['user'] ?> • <span class="time"><?= date('d M Y H:i', $post['time']) ?></span></small>
<h2><?= $post['title'] ?></h2>
<div class="stars">
<?php for($s=1;$s<=5;$s++): ?>
<?= $s <= $post['rating'] ? "⭐" : "☆" ?>
<?php endfor; ?>
</div>
<p><?= $post['story'] ?></p>
<img src="<?= $post['image'] ?>">

<p>
<a class="like" href="?like=<?= $index ?>" onclick="saveScroll()">❤️ <?= $post['likes'] ?> Likes</a>
<?php if(isset($_SESSION['user']) && $_SESSION['user']==$post['user']): ?>
<a href="javascript:editPost(<?= $index ?>)" class="edit-btn">✏ Edit</a>
<a href="?delete=<?= $index ?>" class="delete-btn" onclick="return confirm('Delete this post?')">🗑 Delete</a>
<?php endif; ?>
</p>

<?php foreach($post['reviews'] as $r): ?>
<div class="review">💬 <?= $r ?></div>
<?php endforeach; ?>

<?php if(isset($_SESSION['user'])): ?>
<form method="POST" style="margin-top:10px;">
<input type="hidden" name="post_index" value="<?= $index ?>">
<input type="text" name="comment" placeholder="Add comment..." required>
<button name="add_comment">Post</button>
</form>
<?php endif; ?>
</div>
<?php endforeach; ?>

</div>

<div class="sidebar">
<h3>🔥 Trending Posts</h3>
<?php foreach($trending as $t): ?>
<div class="card">
<img src="<?= $t['image'] ?>" width="80">
<h4><?= $t['title'] ?></h4>
<p>❤️ <?= $t['likes'] ?> Likes</p>
</div>
<?php endforeach; ?>

<h3>🏆 Top Users</h3>
<?php foreach($topUsers as $u=>$likes): ?>
<div class="card">
<img src="https://i.pravatar.cc/50?u=<?= urlencode($u) ?>" width="50">
<h4><?= $u ?></h4>
<p>❤️ <?= $likes ?> Likes</p>
</div>
<?php endforeach; ?>
</div>
</div>

<div class="add-btn" onclick="checkLogin()">+</div>

<!-- POST POPUP -->
<div id="popup" class="popup">
<div class="popup-box">
<span class="close" onclick="closePopup()">✖</span>
<h3>Add Travel Post</h3>
<form method="POST" onsubmit="return validateRating()">
<input type="text" name="title" placeholder="Title" required>
<textarea name="story" placeholder="Write your story..." required></textarea>
<input type="text" name="image" placeholder="Paste Image URL" required>
<div class="star-rating" id="stars">
<span onclick="setRating(1)">★</span>
<span onclick="setRating(2)">★</span>
<span onclick="setRating(3)">★</span>
<span onclick="setRating(4)">★</span>
<span onclick="setRating(5)">★</span>
</div>
<input type="hidden" name="rating" id="ratingInput">
<button name="add_post">Post</button>
</form>
</div>
</div>

<!-- EDIT POPUP -->
<div id="editPopup" class="popup">
<div class="popup-box">
<span class="close" onclick="closeEdit()">✖</span>
<h3>Edit Travel Post</h3>
<form method="POST" onsubmit="return validateEditRating()">
<input type="hidden" name="post_index" id="editIndex">
<input type="text" name="title" id="editTitle" placeholder="Title" required>
<textarea name="story" id="editStory" placeholder="Write your story..." required></textarea>
<input type="text" name="image" id="editImage" placeholder="Paste Image URL" required>
<div class="star-rating" id="editStars">
<span onclick="setEditRating(1)">★</span>
<span onclick="setEditRating(2)">★</span>
<span onclick="setEditRating(3)">★</span>
<span onclick="setEditRating(4)">★</span>
<span onclick="setEditRating(5)">★</span>
</div>
<input type="hidden" name="rating" id="editRatingInput">
<button name="edit_post">Save</button>
</form>
</div>
</div>

<!-- LOGIN POPUP -->
<div id="loginPopup" class="popup">
<div class="popup-box">
<span class="close" onclick="closeLogin()">✖</span>
<h3>Login</h3>
<form method="POST">
<input type="text" name="username" placeholder="Username" required>
<button name="login">Login</button>
</form>
<hr>
<h3>Sign Up</h3>
<form method="POST">
<input type="text" name="username" placeholder="Choose Username" required>
<button name="signup">Sign Up</button>
</form>
</div>
</div>

<script>
function checkLogin(){
<?php if(isset($_SESSION['user'])): ?>
openPopup();
<?php else: ?>
document.getElementById("loginPopup").style.display="flex";
<?php endif; ?>
}
function openPopup(){document.getElementById("popup").style.display="flex";}
function closePopup(){document.getElementById("popup").style.display="none";}
function closeLogin(){document.getElementById("loginPopup").style.display="none";}
function setRating(num){
let stars=document.querySelectorAll("#stars span");
stars.forEach((s,i)=>{s.classList.toggle("active",i<num)});
document.getElementById("ratingInput").value=num;
}
function validateRating(){if(document.getElementById("ratingInput").value==""){alert("Please select rating ⭐");return false;} return true;}
function saveScroll(){localStorage.setItem("scrollPos", window.scrollY);}
window.onload=function(){if(localStorage.getItem("scrollPos")){window.scrollTo(0,localStorage.getItem("scrollPos"));localStorage.removeItem("scrollPos");}}

// EDIT POST
function editPost(idx){
let posts=<?= json_encode($_SESSION['posts']) ?>;
document.getElementById("editIndex").value=idx;
document.getElementById("editTitle").value=posts[idx].title;
document.getElementById("editStory").value=posts[idx].story;
document.getElementById("editImage").value=posts[idx].image;
setEditRating(posts[idx].rating);
document.getElementById("editPopup").style.display="flex";
}
function closeEdit(){document.getElementById("editPopup").style.display="none";}
function setEditRating(num){
let stars=document.querySelectorAll("#editStars span");
stars.forEach((s,i)=>{s.classList.toggle("active",i<num)});
document.getElementById("editRatingInput").value=num;
}
function validateEditRating(){if(document.getElementById("editRatingInput").value==""){alert("Please select rating ⭐");return false;} return true;}
</script>
</body>
</html>
