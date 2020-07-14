import React, { Component } from "react";
import ReactDOM from "react-dom";
// import {BrowserRouter, Link, Route, Switch} from 'react-router-dom';
import Server from "./page/user/server";
class Index extends Component {
    render() {
        return <Server />;
    }
}
ReactDOM.render(<Index />, document.getElementById("index"));
