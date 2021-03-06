import React, {Fragment} from 'react';
import HomeNavBanner from "../components/HomeNavBanner";
import {QueryClient, QueryClientProvider} from "react-query";
import {ReactQueryDevtools} from "react-query/devtools";

import {
    useLogin, useLogout, getID, getEmail, getFirstName, getLastName, StoreContextProvider
} from "../facades/user-store";


const queryClient = new QueryClient();


function About() {
    return (
        <Fragment>
            <div className={'main-container'}>
                <HomeNavBanner urls={["/", "/about", "/login"]}
                               names={["Home", "About", "Login"]}/>
                <div className={'main-header'}>

                </div>
                <div className={'main-body'}>
                    <div className={'inner-body'}>
                        <div className={'inner-body-constraints'}>
                            <div>
                                <p>This is the About page.
                                    <StoreContextProvider>

                                    </StoreContextProvider>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Fragment>
    );
}

export default About;