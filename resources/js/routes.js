import React from "react";

const Home: React.FC = () => {
    return <h1>Home</h1>;
};

const Standing: React.FC = () => {
    return <h1>Standing</h1>;
};

const Teams: React.FC = () => {
    return <h1>Teams</h1>;
};

const Routes = [
    {
        path: "/",
        sidebarname: "Home",
        component: Home
    },
    {
        path: "/standings",
        sidebarname: "standings",
        component: Standing
    },
    {
        path: "/teams",
        sidebarname: "teams",
        component: Teams
    }
];

export default Routes;
