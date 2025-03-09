import React from 'react';
import tw from 'twin.macro';
import styled from 'styled-components/macro';
import { faCreditCard, faWallet } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import PageContentBlock from '@/components/elements/PageContentBlock';

const Box = styled.div`
    ${tw`bg-neutral-700 rounded shadow-md p-6 mb-6`};
`;

const Grid = styled.div`
    ${tw`grid gap-6 md:grid-cols-2 lg:grid-cols-3`};
`;

const Card = styled.div`
    ${tw`bg-neutral-800 rounded p-6 flex items-start space-x-4 transition-colors duration-150`};
    &:hover {
        ${tw`bg-neutral-600`};
    }
`;

const IconWrapper = styled.div`
    ${tw`rounded-full p-3 bg-neutral-700 text-neutral-100`};
`;

const BillingContainer = () => {
    return (
        <PageContentBlock title='Billing'>
            <Grid>
                <Box>
                    <h2 css={tw`text-2xl mb-4 text-neutral-100`}>Current Balance</h2>
                    <div css={tw`flex items-baseline`}>
                        <span css={tw`text-4xl font-bold text-neutral-100`}>$0.00</span>
                        <span css={tw`ml-2 text-neutral-400`}>USD</span>
                    </div>
                    <button
                        css={tw`mt-4 bg-primary-500 p-2 px-4 rounded text-neutral-100 hover:bg-primary-600 transition-colors duration-150`}
                    >
                        Add Funds
                    </button>
                </Box>

                <Box>
                    <h2 css={tw`text-2xl mb-4 text-neutral-100`}>Usage This Month</h2>
                    <div css={tw`flex items-baseline`}>
                        <span css={tw`text-4xl font-bold text-neutral-100`}>$0.00</span>
                        <span css={tw`ml-2 text-neutral-400`}>/mo</span>
                    </div>
                    <div css={tw`mt-2 text-neutral-400`}>Next billing date: Jan 1, 2024</div>
                </Box>
            </Grid>

            <h2 css={tw`text-2xl mt-8 mb-4 text-neutral-100`}>Payment Methods</h2>
            <Grid>
                <Card role='button'>
                    <IconWrapper>
                        <FontAwesomeIcon icon={faCreditCard} css={tw`text-lg`} />
                    </IconWrapper>
                    <div>
                        <h3 css={tw`text-neutral-100 text-lg mb-1`}>Credit Card</h3>
                        <p css={tw`text-neutral-400`}>Add a credit or debit card</p>
                    </div>
                </Card>

                <Card role='button'>
                    <IconWrapper>
                        <FontAwesomeIcon icon={faWallet} css={tw`text-lg`} />
                    </IconWrapper>
                    <div>
                        <h3 css={tw`text-neutral-100 text-lg mb-1`}>PayPal</h3>
                        <p css={tw`text-neutral-400`}>Connect your PayPal account</p>
                    </div>
                </Card>
            </Grid>

            <h2 css={tw`text-2xl mt-8 mb-4 text-neutral-100`}>Billing History</h2>
            <Box>
                <div css={tw`flex items-center justify-between py-4 border-b border-neutral-600`}>
                    <div>
                        <div css={tw`text-neutral-100`}>Server Hosting - Basic Plan</div>
                        <div css={tw`text-sm text-neutral-400`}>Dec 1, 2023</div>
                    </div>
                    <div css={tw`text-neutral-100`}>$10.00</div>
                </div>
                <div css={tw`flex items-center justify-between py-4 border-b border-neutral-600`}>
                    <div>
                        <div css={tw`text-neutral-100`}>Additional Storage</div>
                        <div css={tw`text-sm text-neutral-400`}>Nov 15, 2023</div>
                    </div>
                    <div css={tw`text-neutral-100`}>$5.00</div>
                </div>
                <div css={tw`flex items-center justify-between py-4`}>
                    <div>
                        <div css={tw`text-neutral-100`}>Server Hosting - Basic Plan</div>
                        <div css={tw`text-sm text-neutral-400`}>Nov 1, 2023</div>
                    </div>
                    <div css={tw`text-neutral-100`}>$10.00</div>
                </div>
            </Box>
        </PageContentBlock>
    );
};

export default BillingContainer; 