<style>

* {
  padding: 0;
  margin: 0;
}
body {
  background-image: linear-gradient(45deg, black, #00ffd0);
  background-attachment: fixed;
  min-width: 400px;
}

main {
  min-height: 100vh;
  margin: 0 auto;
  width: 1024px;
  padding: 50px 40px;
  background-color: #00000055;
  color: #fff;
  min-width: 400px;
}

header, footer {
  position: fixed;
  left: 0;
  width: 100%;
  height: 40px;
  background: #00000055;
  z-index: 100;
}
header {
  top: 0;
}
footer {
  bottom: 0;
}

/* ---------------------------------------------------- */

.entity-list {
  display: flex;
  flex-flow: row wrap;
}
.entity-list::after {
  content: '';
  flex-grow: 1000;
}

.entity-item {
  flex: 1 1 200px;
  text-overflow: ellipsis;
  overflow: hidden;
  /* word-wrap: break-word; */
}

.entity-card {
  height: 100px;
  padding: 10px;
  border-radius: 5px;
  background-color: #ffffffdd;
  color: #222;
  margin: 0 5px 10px;
  position: relative;
  z-index: 1;
  text-overflow: ellipsis;
  overflow: hidden;
}
.entity-card .remove {
  font-style: normal;
  transition: transform .5s ease-in-out;
  display: inline-flex;
  position: absolute;
  top: 10px;
  right: 10px;
  z-index: 10;
  cursor: pointer;
}
.entity-card .remove:hover {
  transform: rotate(360deg);
}

.view-list .entity-item {
  flex: 1 1 100%;
}
.view-list .entity-item:nth-child(odd) .entity-card {
  background-color: #ffffffdd;
}
.view-list .entity-card {
  /* height: 20px; */
}
.view-list .entity-card {
  height: auto;
  min-height: 20px;
  display: flex;
  flex-flow: row wrap;
  border-radius: 0;
  margin-bottom: 0;
  border-bottom: 1px solid #00000055;
}
.view-list .entity-card > div {
  flex: 1 1 20%;
}
.view-list .entity-card > div:nth-child(1) {
  flex: 0 0 50px;
}
.view-list .entity-card > div:nth-child(3) {
  flex: 1 1 60%;
  overflow: hidden;
  text-overflow: ellipsis;
  margin-left: 10px;
  margin-right: 20px;
}
.prop-id {
  display: none;
}

.view-list .prop-id {
  display: block;
  text-align: center;
}

/* ---------------------------------------------------- */

.form-wrap {
  margin: 20px auto;
  width: 400px;
  border: 1px solid #000;
  border-radius: 10px;
  background: rgba(0,0,0,0.5);
  padding: 20px 40px;
  text-align: center;
}
form.form {
  display: flex;
  flex-flow: column wrap;
  padding: 20px 0;
}

form.form > * {
  display: block;
  width: 70%;
  padding: 5px 10px;
  margin: 0 auto 10px;
  box-sizing: border-box;
}
form.form > button:last-child {
  margin-bottom: 0;
}

/* ---------------------------------------------------- */

@media (max-width: 640px) {
  main { width: 100vw; }
  .view-grid .entity-item {
    flex: 1 1 200px;
  }
  .view-list .entity-card > div {
    flex: 1 1 13%;
  }
  .view-list .entity-card > div:nth-child(3) {
    flex: 1 1 50%;
  }
  .form-wrap {
    width: 90%;
    padding: 20px;
  }
  form.form > * {
    display: block;
    width: 70%;
  }
}

@media (min-width: 640px)  {
  main { width: 640px; }
  .view-grid .entity-item {
    flex: 1 1 200px;
  }
  .view-list .entity-card > div {
    flex: 1 1 13%;
  }
  .view-list .entity-card > div:nth-child(3) {
    flex: 1 1 60%;
  }
}

@media (min-width: 768px) {
  main { width: 768px; }
}

@media (min-width: 1024px) {
  main { width: 1000px; }
}

@media (min-width: 1200px) {
  main { width: 1200px; }
}

</style>