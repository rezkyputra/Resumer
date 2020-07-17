import React, { Component } from "react";
import ReactDOM from "react-dom";
import App from "./Home";
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import Login from "./page/auth/login";

class Index extends Component {
    render() {
        return (
            <div>
                <Router>
                    {/* <Route exact path="/" component={Dashboard} /> */}
                    <App />
                    {/* <Route exact path="/login" component={Login} /> */}
                </Router>
            </div>
        );
    }
}

ReactDOM.render(<Index />, document.getElementById("index"));
