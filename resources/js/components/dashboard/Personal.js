import React, { Component } from "react";
import { Typography, Container, Grid, Paper, Box } from "@material-ui/core";

class Personal extends Component {
    render() {
        return (
            <div>
                <Container maxWidth="lg">
                    <Grid container spacing={1}>
                        <Grid md={10}>
                            <Paper elevation={3}>
                                <Grid container spacing={1}>
                                    <Grid item md={2}>
                                        <Typography>Hai</Typography>
                                    </Grid>
                                    <Grid item md={5}>
                                        <Grid container>
                                            <Grid md={5}>
                                                <Typography>Nama</Typography>
                                                <Typography>Email</Typography>
                                                <Typography>
                                                    Place of Birth
                                                </Typography>
                                                <Typography>
                                                    Date of Birth
                                                </Typography>
                                                <Typography>Gender</Typography>
                                                <Typography>Address</Typography>
                                                <Typography>Phone</Typography>
                                                <Typography>Hobby</Typography>
                                                <Typography>
                                                    Link Git
                                                </Typography>
                                                <Typography>
                                                    Link Twitter
                                                </Typography>
                                                <Typography>
                                                    Link Linked
                                                </Typography>
                                                <Typography>
                                                    Link Facebook
                                                </Typography>
                                            </Grid>
                                            <Grid md={2}>
                                                <Typography>:</Typography>
                                                <Typography>:</Typography>
                                                <Typography>:</Typography>
                                                <Typography>:</Typography>
                                                <Typography>:</Typography>
                                                <Typography>:</Typography>
                                                <Typography>:</Typography>
                                                <Typography>:</Typography>
                                                <Typography>:</Typography>
                                                <Typography>:</Typography>
                                                <Typography>:</Typography>
                                                <Typography>:</Typography>
                                            </Grid>
                                            <Grid md={5}>
                                                <Typography>
                                                    Rezky Putra Akkif
                                                </Typography>
                                                <Typography>
                                                    Rezky Putra Akkif
                                                </Typography>
                                                <Typography>
                                                    Rezky Putra Akkif
                                                </Typography>
                                                <Typography>
                                                    Rezky Putra Akkif
                                                </Typography>
                                                <Typography>
                                                    Rezky Putra Akkif
                                                </Typography>
                                                <Typography>
                                                    Rezky Putra Akkif
                                                </Typography>
                                                <Typography>
                                                    Rezky Putra Akkif
                                                </Typography>
                                                <Typography>
                                                    Rezky Putra Akkif
                                                </Typography>
                                                <Typography>
                                                    Rezky Putra Akkif
                                                </Typography>
                                                <Typography>
                                                    Rezky Putra Akkif
                                                </Typography>
                                                <Typography>
                                                    Rezky Putra Akkif
                                                </Typography>
                                                <Typography>
                                                    Rezky Putra Akkif
                                                </Typography>
                                            </Grid>
                                        </Grid>
                                    </Grid>
                                </Grid>
                            </Paper>
                        </Grid>
                    </Grid>
                </Container>
            </div>
        );
    }
}

export default Personal;
