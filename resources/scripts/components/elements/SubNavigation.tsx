import styled from 'styled-components/macro';
import tw, { theme } from 'twin.macro';
import { breakpoint } from '@/theme';

const SubNavigation = styled.div`
    // Mobile styles (default)
    ${tw`w-full bg-neutral-700 shadow`};

    & > div {
        ${tw`flex items-center text-sm`};

        & > a,
        & > div {
            ${tw`inline-block py-3 px-4 text-neutral-300 no-underline whitespace-nowrap transition-all duration-150`};

            &:not(:first-of-type) {
                ${tw`ml-2`};
            }

            &:hover {
                ${tw`text-neutral-100`};
            }

            &:active,
            &.active {
                ${tw`text-neutral-100`};
            }
        }
    }

    // Desktop styles (sidebar)
    ${breakpoint('md')`
        ${tw`fixed left-0 h-screen w-56 bg-neutral-800 shadow-lg z-10`};
        top: 3.5rem;
        height: calc(100vh - 3.5rem);

        & > div {
            ${tw`flex-col items-stretch h-full`};

            & > a,
            & > div {
                ${tw`w-full py-3.5 px-6 text-base border-l-2 border-transparent`};
                margin: 0 !important;

                &:hover {
                    ${tw`bg-neutral-700 text-neutral-100`};
                }

                &:active,
                &.active {
                    ${tw`bg-neutral-700 text-neutral-100 border-l-2`};
                    border-left-color: ${theme`colors.cyan.600`.toString()};
                }
            }
        }
    `}
`;

export default SubNavigation;
