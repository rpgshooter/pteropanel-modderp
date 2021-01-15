import http, { FractalResponseData } from '@/api/http';

export interface Role {
    id: number;
    name: string;
    description?: string;
}

export const rawDataToRole = ({ attributes }: FractalResponseData): Role => ({
    id: attributes.id,
    name: attributes.name,
    description: attributes.description,
});

export default (include: string[] = []): Promise<Role[]> => {
    return new Promise((resolve, reject) => {
        http.get('/api/application/roles', { params: { include: include.join(',') } })
            .then(({ data }) => resolve((data.data || []).map(rawDataToRole)))
            .catch(reject);
    });
};
