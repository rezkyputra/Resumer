import React, { useState } from "react";
import ReactDOM from "react-dom";
import clsx from "clsx";
import { makeStyles, useTheme } from "@material-ui/core/styles";
import {
    Drawer,
    CssBaseline,
    AppBar,
    Toolbar,
    List,
    ListItem,
    ListItemIcon,
    ListItemText,
    Typography,
    Divider,
    IconButton,
    Collapse
} from "@material-ui/core";

//Icon
import MenuIcon from "@material-ui/icons/Menu";
import ExpandLess from "@material-ui/icons/ExpandLess";
import ExpandMore from "@material-ui/icons/ExpandMore";
import HomeIcon from "@material-ui/icons/Home";
import ChevronLeftIcon from "@material-ui/icons/ChevronLeft";
import ChevronRightIcon from "@material-ui/icons/ChevronRight";
import PersonIcon from "@material-ui/icons/Person";
import ContactsIcon from "@material-ui/icons/Contacts";
import SchoolIcon from "@material-ui/icons/School";
import WorkIcon from "@material-ui/icons/Work";
import ComputerIcon from "@material-ui/icons/Computer";
import WebIcon from "@material-ui/icons/Web";
import AssignmentIcon from "@material-ui/icons/Assignment";

import Home from "./index";

import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";

const drawerWidth = 240;

const useStyles = makeStyles(theme => ({
    root: {
        display: "flex"
    },
    appBar: {
        transition: theme.transitions.create(["margin", "width"], {
            easing: theme.transitions.easing.sharp,
            duration: theme.transitions.duration.leavingScreen
        })
    },
    appBarShift: {
        width: `calc(100% - ${drawerWidth}px)`,
        marginLeft: drawerWidth,
        transition: theme.transitions.create(["margin", "width"], {
            easing: theme.transitions.easing.easeOut,
            duration: theme.transitions.duration.enteringScreen
        })
    },
    link: {
        // textDecoration: "none",
        color: theme.palette.text.primary
    },
    menuButton: {
        marginRight: theme.spacing(2)
    },
    hide: {
        display: "none"
    },
    drawer: {
        width: drawerWidth,
        flexShrink: 0
    },
    drawerPaper: {
        width: drawerWidth
    },
    drawerHeader: {
        display: "flex",
        alignItems: "center",
        padding: theme.spacing(0, 1),
        // necessary for content to be below app bar
        ...theme.mixins.toolbar,
        justifyContent: "flex-end"
    },
    content: {
        flexGrow: 1,
        padding: theme.spacing(3),
        transition: theme.transitions.create("margin", {
            easing: theme.transitions.easing.sharp,
            duration: theme.transitions.duration.leavingScreen
        }),
        marginLeft: -drawerWidth
    },
    contentShift: {
        transition: theme.transitions.create("margin", {
            easing: theme.transitions.easing.easeOut,
            duration: theme.transitions.duration.enteringScreen
        }),
        marginLeft: 0
    },

    nested: {
        paddingLeft: theme.spacing(4)
    }
}));

export default function Server() {
    const classes = useStyles();
    const theme = useTheme();
    const [open, setOpen] = useState(false);
    const [dropDown, setdropDown] = useState(false);

    const handleDrawerOpen = () => {
        setOpen(true);
    };

    const handleDrawerClose = () => {
        setOpen(false);
    };

    const handleClick = () => {
        setdropDown(!dropDown);
    };

    return (
        <div className={classes.root}>
            <CssBaseline />
            <AppBar
                position="fixed"
                className={clsx(classes.appBar, {
                    [classes.appBarShift]: open
                })}
            >
                <Toolbar>
                    <IconButton
                        color="inherit"
                        aria-label="open drawer"
                        onClick={handleDrawerOpen}
                        edge="start"
                        className={clsx(
                            classes.menuButton,
                            open && classes.hide
                        )}
                    >
                        <MenuIcon />
                    </IconButton>
                    <Typography variant="h6" noWrap>
                        Persistent drawer
                    </Typography>
                </Toolbar>
            </AppBar>
            <Router>
                <Drawer
                    className={classes.drawer}
                    variant="persistent"
                    anchor="left"
                    open={open}
                    classes={{
                        paper: classes.drawerPaper
                    }}
                >
                    <div className={classes.drawerHeader}>
                        <IconButton onClick={handleDrawerClose}>
                            {theme.direction === "ltr" ? (
                                <ChevronLeftIcon />
                            ) : (
                                <ChevronRightIcon />
                            )}
                        </IconButton>
                    </div>
                    <Divider />
                    <List>
                        <Link
                            to="/"
                            className={classes.link}
                            style={{ textDecoration: "none" }}
                        >
                            <ListItem button>
                                <ListItemIcon>
                                    <HomeIcon />
                                </ListItemIcon>
                                <ListItemText primary={"Halo"} />
                            </ListItem>
                        </Link>
                        <Link
                            to="/About"
                            className={classes.link}
                            style={{ textDecoration: "none" }}
                        >
                            <ListItem button>
                                <ListItemIcon>
                                    <MenuIcon />
                                </ListItemIcon>
                                <ListItemText primary={"About"} />
                            </ListItem>
                        </Link>

                        <ListItem button onClick={handleClick}>
                            <ListItemIcon>
                                <PersonIcon />
                            </ListItemIcon>
                            <ListItemText primary="Biodata" />
                            {dropDown ? <ExpandLess /> : <ExpandMore />}
                        </ListItem>
                        <Collapse in={dropDown} unmountOnExit>
                            <List component="div" disablePadding>
                                <ListItem button className={classes.nested}>
                                    <ListItemIcon>
                                        <ContactsIcon />
                                    </ListItemIcon>
                                    <ListItemText primary="Personal Data" />
                                </ListItem>
                                <ListItem button className={classes.nested}>
                                    <ListItemIcon>
                                        <SchoolIcon />
                                    </ListItemIcon>
                                    <ListItemText primary="Education" />
                                </ListItem>
                                <ListItem button className={classes.nested}>
                                    <ListItemIcon>
                                        <WorkIcon />
                                    </ListItemIcon>
                                    <ListItemText primary="Exprience" />
                                </ListItem>
                                <ListItem button className={classes.nested}>
                                    <ListItemIcon>
                                        <ComputerIcon />
                                    </ListItemIcon>
                                    <ListItemText primary="Skill" />
                                </ListItem>
                                <ListItem button className={classes.nested}>
                                    <ListItemIcon>
                                        <WebIcon />
                                    </ListItemIcon>
                                    <ListItemText primary="Portofolio" />
                                </ListItem>
                                <ListItem button className={classes.nested}>
                                    <ListItemIcon>
                                        <AssignmentIcon />
                                    </ListItemIcon>
                                    <ListItemText primary="Award" />
                                </ListItem>
                            </List>
                        </Collapse>
                    </List>
                </Drawer>
                <main
                    className={clsx(classes.content, {
                        [classes.contentShift]: open
                    })}
                >
                    <div className={classes.drawerHeader} />
                    <Switch>
                        <Route exact path="/" component={Home} />
                        <Route exact path="/About">
                            Ini About
                        </Route>
                        <Route exact path="/About">
                            Ini About
                        </Route>
                    </Switch>
                </main>
            </Router>
        </div>
    );
}

if (document.getElementById("server")) {
    ReactDOM.render(<Server />, document.getElementById("server"));
}
